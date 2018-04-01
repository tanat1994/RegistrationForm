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
class memberController extends Controller
{
    //
    public function memberRecord(){
        
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'memberController/memberRecord'
        )->getbody();
        $memberList = json_decode($result, true);
        $memberRecord = $memberList;
        return view('member.index2',['memberRecord' => $memberRecord]);
        //return view('GroupManagement.index21',['memberRecord' => $memberRecord]);
    }

    public function memberRecordDashboard(){
        $client = new Client();
        //$result = $client->request('GET', 'http://127.0.0.1/WebsiteAPI-NAT/public/index.php/bdReportController/bdReportToday')->getbody();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'memberController/memberRecordDashboard'
        )->getbody();
        $memberList = json_decode($result, true);
        $memberRecord = $memberList;
        return view('Dashboard.index',['memberRecord' => $memberRecord]);
    }

    public static function memberNumber(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/memberController/memberNumber'
        )->getbody();
        $memberNumber = json_decode($result, true);
        return $memberNumber;
    }

    public static function deptList(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'educationController/deptList'
        )->getbody();
        $degreeList = json_decode($result, true);
        return $degreeList;
    }

    public static function facultyList(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'educationController/facultyList'
        )->getbody();
        $facultyList = json_decode($result, true);
        return $facultyList;
    }

    public static function groupList(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'educationController/groupList'
        )->getbody();
        $majorList = json_decode($result, true);
        return $majorList;
    }

    public static function classList(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'educationController/classList'
        )->getbody();
        $majorList = json_decode($result, true);
        return $majorList;
    }

    public static function postMemberInsert(CreateRegisterRequest $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'memberController/memberSingleInsert',
            ['form_params' =>
                [
                    'PtnId' => $request->input('regis_PtnId'),        
                    'PtnClassId' => (int)$request->input('regis_PtnClassId'),
                    'PtnGroup' => $request->input('regis_group'),
                    'FacCode' => $request->input('regis_faculty'),
                    'Dept' => $request->input('regis_dept'),
                    'Exp_Date' => $request->input('regis_expire_date'),
                    'RFId' => $request->input('regis_rfid'),
                    'UnivId' => $request->input('regis_UnivId'),
                    'Barcode' => $request->input('regis_barcode'),       
                    'Title' => $request->input('regis_titleId'),
                    'FName' => $request->input('regis_name'),
                    'LName' => $request->input('regis_lastname'),
                    'Address1' => $request->input('regis_address1'),
                    'Address2' => $request->input('regis_address2'),
                    'Address3' => $request->input('regis_address3'),
                    'Phone1' => $request->input('regis_Phone1'),
                    'Phone2' => $request->input('regis_Phone2'),
                    'Email' => $request->input('regis_email'),
                ]
            ])->getBody();
            $inputResult = json_decode($result, true);
            $arryResult = $inputResult;
            return redirect('membermanagement');
    }

    public static function memberSingleInsert(Request $request){
        $client = new Client();
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI')."memberController/memberSingleInsert",
            ['form_params' =>
                [
                    'memberId' => $request->input('regis_memberId'),        
                    'cardUID' => $request->input('regis_cardUID'),
                    'positionId' => $request->input('regis_position'),
                    'titleId' => $request->input('regis_titleId'),
                    'firstname' => $request->input('regis_name'),
                    'lastname' => $request->input('regis_lastname'),
                    'degreeId' => (int)$request->input('regis_degree'),
                    'facultyId' => (int)$request->input('regis_faculty'),
                    'majorId' => 1,       
                ]
            ])->getBody();
        $inputResult = json_decode($result, true);
        $arryResult = $inputResult;
        dd($arryResult);
    }

    public static function memberSearchandFilter (Request $request) {
        $client = new Client();
        $stringsearch = $request->input('searchString');
        if($stringsearch == ''){
            $stringsearch = 'null';
        }else{
            ;
        }
        $result = $client->request(
            'POST',
            config('pathConfig.pathAPI')."memberController/memberSearchFilter",
            [
                'form_params' => [
                    'searchString' => $stringsearch,
                    'PtnClassId' => $request->input('PtnClassId'),
                    'PtnGroup' => $request->input('PtnGroup'),
                    'DeptId' => $request->input('DeptId'),
                    'FacId' => $request->input('FacId'),
                    'Status' => $request->input('Status')
                ]
            ]
        )->getBody();
        $outputResult = json_decode($result, true);
        $arryResult = $outputResult["data"];
        // dd($arryResult);
        return view('Member.searchFilter',['searchResult' => $arryResult]);
        // if($stringsearch == ''){
        //     echo "Empty";
        // }else{
        //     echo "Has value";
        // }
    }
}
