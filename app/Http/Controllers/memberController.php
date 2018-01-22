<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\isEmpty;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class memberController extends Controller
{
    //
    public function memberRecord(){
        
        $client = new Client();
        //$result = $client->request('GET', 'http://127.0.0.1/WebsiteAPI-NAT/public/index.php/bdReportController/bdReportToday')->getbody();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'/memberController/memberRecord'
        )->getbody();
        $memberList = json_decode($result, true);
        $memberRecord = $memberList;
        return view('Member.index',['memberRecord' => $memberRecord]);
        //return view('GroupManagement.index21',['memberRecord' => $memberRecord]);
    }

    public static function degreeList(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'educationController/degreeList'
        )->getbody();
        $degreeList = json_decode($result, true);
        return $degreeList;
    }

    public static function memberTest(){
        $test = "helloworld";
        return $test;
    }
}
