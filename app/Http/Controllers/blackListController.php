<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\isEmpty;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class blackListController extends Controller
{
    public static function getAllBlackList(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'blackListController/getAllBlackList'
        )->getbody();
        $searchResult = json_decode($result, true);
        $arryResult = $searchResult;
        return view('BlackList.index',['blacklistRecord' => $arryResult]);
    }

    public static function getBlackListIndex(){
    }
}
