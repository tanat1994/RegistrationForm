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
            $filePath = public_path().'/images/'.$request->input('vis_name_en').'_'.$request->input('regis_visitor_cardId').'.jpg';
            file_put_contents($filePath, $visitorImageDecoded);	
            //$filePath->move(public_path().'/images/visitor_Image', $filePath);
        
        $result = $client->request(
            'POST',
            "http://127.0.0.1/Website-Nat/public/index.php/visitorController/visitorSingleInsert",
            ['form_params' =>
                [
                    'regis_card_id' => $request->input('regis_visitor_cardId'),
                    'regis_visitor_type' => $request->input('regis_visitor_type'),
                    'regis_visitor_card' => (int)$request->input('regis_visitor_card'),
                    'regis_visitor_titleId' => (int)$request->input('regis_visitor_titleId'),
                    'vis_name_en' => $request->input('vis_name_en'),
                    'vis_lastname_en' => $request->input('vis_lastname_en'),
                    'vis_name_th' => $request->input('vis_name_th'),
                    'vis_lastname_th' => $request->input('vis_lastname_th'),
                    'regis_visitor_address' => $request->input('regis_visitor_address'),
                    'regis_visitor_total' => (int)$request->input('regis_visitor_total'),
                    'regis_visitor_flag' => (int)$request->input('regis_visitor_flag'),
                    'regis_visitor_image' => $filePath
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
        //return $visitorLists;
        return view('member.webcam',['visitorLists' => $visitorLists]);
    }

}
