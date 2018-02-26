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

class visitorController extends Controller
{
    public function visitorCardRecord(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'cardController/listAllCard'
        )->getbody();
        $cardList = json_decode($result, true);
        $cardRecord = $cardList;
        return view('member.register',['cardRecord' => $cardRecord]);
    }
}
