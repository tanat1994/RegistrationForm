<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\isEmpty;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class bdReportController extends Controller
{
    public function index(){
        
        $client = new Client();
        //$result = $client->request('GET', 'http://127.0.0.1/WebsiteAPI-NAT/public/index.php/bdReportController/bdReportToday')->getbody();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/bdReportController/bdReportToday'
        )->getbody();
        $bookShow = json_decode($result, true);
        $bookShowPage = $bookShow;

        return view('Member.index',['bookShow' => $bookShowPage]);
    }

    public function searchKeyword(Request $request){
        $this->validate($request, [
            'keyword' => 'required'
        ]);


        $client = new Client();
        $result = $client->request(
            'POST', 
            config('pathconfig.pathREST').'/bdReportController/bdReportSearchbyKeyword',
            ['form_params' =>[
                'keyword' => $request->input('keyword'),
                'daterange' => $request->input('daterange'),
                'station_id' => $request->input('station_id'),
                'type' => $request->input('type'),
                'bookbin_station_id' => $request->input('bookbin_station_id'),
                'status' => $request->input('status')
            ]
            ])->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult['data'];
        //dd($arryResult);
        if($arryResult=="{}"){ // "{}" = EMPTY IDK why
            return view('home.home');
        }else{
            return view('bookdrop.bdResult',['searchResult' => $arryResult]);
        }

        // return view();

    }

    public function bdReportImages(Request $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathconfig.pathREST').'/bdReportController/bdReportImages',
            [
                'form_params' =>
                [
                    'daterange' => $request->input('daterange'),        
                    'station_id' => $request->input('station_id'),
                    'status' => $request->input('status')            
                ]
            ]
        )->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult['data'];
        dd($arryResult);
    }

    public function bdReportStatistic(Request $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathconfig.pathAPI').'/bdReportController/bdReportStatistic',
            [
                'form_params' =>
                [
                    'sort_by' => $request->input('sort_by'),        
                    'daterange' => $request->input('daterange'),         
                ]
            ]
        )->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult['data'];
        dd($arryResult);
    }
}
