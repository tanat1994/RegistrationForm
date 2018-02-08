<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\isEmpty;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class groupController extends Controller
{
    //
    public static function getAllGroup(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'groupController/getAllGroup'
        )->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult;
        return $arryResult;
    }

    public static function GroupTest(){
        return view('GroupManagement.test');
    }

    public static function groupRecord(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'groupController/groupInitial',
            [
                'form_params' =>[
                    'groupId' => 0
                ]
            ]
        )->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult['data'];
        return view('GroupManagement.test',['groupRecord' => $arryResult]);
    }

    public static function test(){
        return 'hrello';
    }

    public function groupInitial(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/groupController/groupInitial'
        )->getbody();
        $groupInit = json_decode($result, true);
        $groupRecord = $groupInit['data'];
        return view('GroupManagement.test',['groupRecord' => $groupRecord]);//response()->json(['groupInit' => $groupRecord]);
    }

    public function hasChild(){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'/groupController/grouphasChild'
        )->getbody();
        $groupInit = json_decode($result, true);
        $groupRecord = $groupInit['data'];

        return response()->json(['groupChild' => $groupRecord]);
    }

    public static function groupSearch($groupId){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'groupController/ChildSearching',
            [
                'form_params' =>[
                    'groupId' => $groupId
                ]
            ]
        )->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult['data'];
        return $arryResult;
    }
}
