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

    public static function test(){
        return 'hrello';
    }

    public function groupInitial(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/groupController/getGroupList'
        )->getbody();
        $groupInit = json_decode($result, true);
        $groupRecord = $groupInit['data'];
        //dd($groupRecord);
        return view('GroupManagement.test',['groupRecord' => $groupRecord]);
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

    public static function postVisitorCardInsert(CreateRegisterRequest $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'groupController/insertGroup',
            ['form_params' =>
                [
                    'regis_groupId' => $request->input('regis_groupId'),
                    'regis_groupName' => $request->input('regis_groupName')
                ]
            ]
        )->getbody();
        $inputResult = json_decode($result, true);
        $arryResult = $inputResult;
        return redirect('groupmanagement');
    }

    public static function groupNumber(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/groupController/countGroup'
        )->getbody();
        $groupNumber = json_decode($result, true);
        return $groupNumber;
    }

    public static function getAllAntiPassbackGroup() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/groupController/getAllAntiPassbackGroup'
        )->getbody();
        $groupAntiPassback = json_decode($result, true);
        return $groupAntiPassback;
    }

    public static function addNewAntipassbackGroup(Request $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI')."groupController/createAntiPassbackGroup",
            ['form_params' =>
                [
                    'groupName' => $request->input('add_groupName'),        
                    'anti_passback_time' => $request->input('add_anti_passback_time'), 
                ]
            ])->getBody();
            return redirect('groupmanagement');
    }


    public static function addMemberToAntiPassbackGroup(Request $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI')."groupController/addMembertoAntipassbackGroup",
            [
                'form_params' => [
                    'PtnId' => $request->input('add_PtnId'),
                    'group_anti_passback_id' => $request->input('add_member_to_group')
                ]
            ]
        )->getBody();
        return redirect('groupmanagement');
    }
}
