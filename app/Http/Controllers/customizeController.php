<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class customizeController extends Controller
{
    public static function themeColor(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI_customize')
        )->getbody();
        $customizeInfo = json_decode($result, true);
        $datacustomizeInfo = $customizeInfo["data"];
        $theme_color = $datacustomizeInfo[0]["config_value"];
        return $theme_color;
    }

    public static function headerTitle() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI_header_title')
        )->getbody();
        $headerInfo = json_decode($result, true);
        $headerInfoLists = $headerInfo["data"];
        $headerTitle = $headerInfoLists[0]["config_value"];
        return $headerTitle;
    }

    public static function logoHeader() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI_header_title')
        )->getbody();
        $headerInfo = json_decode($result, true);
        $headerInfoLists = $headerInfo["data"];
        $headerTitle = $headerInfoLists[1]["config_value"];
        return $headerTitle;
    }
}