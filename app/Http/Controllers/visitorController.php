<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\isEmpty;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Http\Requests\CreateRegisterRequest;

use File;

class visitorController extends Controller
{
    public function visitorCardRecord(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'cardController/listBorrowRecord'
        )->getbody();
        $cardList = json_decode($result, true);
        $borrowRecord = $cardList;
        return view('member.register',['borrowRecord' => $borrowRecord]);
    }

    public function visitorCardRecordonDashBoard() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'cardController/listBorrowRecord'
        )->getbody();
        $cardList = json_decode($result, true);
        $borrowRecord = $cardList;
        return view('Dashboard.index',['borrowRecord' => $borrowRecord]);
    }

    public static function listAllVisitorCard() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'cardController/listAllCard'
        )->getbody();
        $visitorCardLists = json_decode($result, true);
        return $visitorCardLists;
    }

    public function postVisitorInsert(CreateRegisterRequest $request){
        $client = new Client();
            $visitorImageDecoded = base64_decode($request->input('visitor_image_input'));
            $filePath = $request->input('vis_name_en').'_'.$request->input('regis_visitor_cardId').'.jpg';
            file_put_contents(public_path().'/images/visitor_Images/'.$filePath, $visitorImageDecoded);	
            //$filePath->move(public_path().'/images/visitor_Image', $filePath);
        
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI')."visitorController/visitorSingleInsert",
            ['form_params' =>
                [
                    'regis_card_id' => $request->input('regis_visitor_cardId'),
                    'regis_visitor_type' => $request->input('regis_visitor_type'),
                    'regis_visitor_card' => $request->input('regis_visitor_card'),
                    'regis_visitor_titleId' => (int)$request->input('regis_visitor_titleId'),
                    'vis_name_en' => $request->input('vis_name_en'),
                    'vis_lastname_en' => $request->input('vis_lastname_en'),
                    'vis_name_th' => $request->input('vis_name_th'),
                    'vis_lastname_th' => $request->input('vis_lastname_th'),
                    'regis_visitor_address' => $request->input('regis_visitor_address'),
                    'regis_visitor_total' => (int)$request->input('regis_visitor_total'),
                    'regis_visitor_flag' => (int)$request->input('regis_visitor_flag'),
                    'regis_visitor_image' => $filePath,
                    'regis_date_of_birth' => $request->input('vis_date_of_birth')
                ]
            ])->getBody();
        $inputResult = json_decode($result, true);
        $arryResult = $inputResult;
        return redirect('memberregister');
    }

    public static function getAllVisitorLists(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'visitorController/getAllVisitorLists'
        )->getbody();
        $visitorLists = json_decode($result, true);
        return $visitorLists;
        //return view('member.webcam',['visitorLists' => $visitorLists]);
    }

    public static function listAllCard() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'cardController/getAllVisitorCard'
        )->getbody();
        $cardLists = json_decode($result, true);
        return view('CardManagement.index', ['cardLists' => $cardLists]);
    }

    public static function listAllCardDashboard() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'cardController/getAllVisitorCard'
        )->getBody();
        $cardLists = json_decode($result, true);
        return view('Dashboard.index', ['cardLists' => $cardLists]);
    }

    public function postVisitorCardInsert(CreateRegisterRequest $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'cardController/postInsertVisitorCard',
            ['form_params' =>
                [
                    'cardName' => $request->input('vis_cardName'),
                    'cardUID' => $request->input('vis_cardUID'),
                ]
            ])->getBody();
        return redirect('cardmanagement');
    }

    public static function countVisitorToday(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'visitorController/countVisitorToday'
        )->getBody();
        $numberVisitor = json_decode($result, true);
        return $numberVisitor;
    }

}
