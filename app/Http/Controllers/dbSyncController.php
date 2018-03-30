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
use App\Http\Controllers\dbSyncController;
class dbSyncController extends Controller
{
    public static function getClass(){
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'dbSyncController/getCLASS'
        )->getbody();
        $classList = json_decode($result, true);
        $classRecord = $classList;
        return $classRecord["data"];
    }

    public static function syncClassToDb(){
        $client = new Client();
        $classObj = dbSyncController::getClass();
        foreach ($classObj as $key => $value){
            $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'educationController/insertClass',
                [
                    'form_params' =>[
                        'PtnClassId' => $value["PtnClassId"],
                        'Th_Name' => $value["Name"]
                    ]
                ]
            )->getBody();
        }
        $success = "success";
        return $success;
    }

    public static function getGroup() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'dbSyncController/getPTNGROUP'
        )->getbody();
        $groupList = json_decode($result, true);
        $groupRecord = $groupList;
        return $groupRecord["data"];
    }

    public static function syncGroupToDb(){
        $client = new Client();
        $classObj = dbSyncController::getGroup();
        foreach ($classObj as $key => $value){
            $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'educationController/insertGroup',
                [
                    'form_params' =>[
                        'PtnGroupId' => $value["PtnGroupId"],
                        'Th_Name' => $value["Name"]
                    ]
                ]
            )->getBody();
        }
        $success = "success";
        return $success;
    }

    public static function getFaculty() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'dbSyncController/getFACULTY'
        )->getbody();
        $facultyList = json_decode($result, true);
        $facultyRecord = $facultyList;
        return $facultyRecord["data"];
    }

    public static function syncFacultyToDb() {
        $client = new Client();
        $facultyObj = dbSyncController::getFaculty();
        foreach ($facultyObj as $key => $value){
            $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'educationController/insertFaculty',
                [
                    'form_params' =>[
                        'FacId' => $value["FacId"],
                        'FacCode' => $value["FacCode"],
                        'En_Name' => $value["En_Name"],
                        'Th_Name' => $value["Th_Name"]
                    ]
                ]
            )->getBody();;
        }
        $success = "success";
        return $success;
    }

    public static function getDept() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'dbSyncController/getDEPT'
        )->getbody();
        $deptList = json_decode($result, true);
        $deptRecord = $deptList;
        return $deptRecord["data"];
    }

    public static function syncDeptToDb() {
        $client = new Client();
        $deptObj = dbSyncController::getDept();
        foreach ($deptObj as $key => $value){
            $result = $client->request(
            'POST',
            config('pathConfig.pathAPI').'educationController/insertDept',
                [
                    'form_params' =>[
                        'DeptId' => $value["DeptId"],
                        'DeptCode' => $value["DeptCode"],
                        'En_Name' => $value["En_Name"],
                        'Th_Name' => $value["Th_Name"]
                    ]
                ]
            )->getBody();
        }
        $success = "success";
        return $success;
    }

    public static function getPatron() {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'dbSyncController/getPATRON'
        )->getbody();
        $patronList = json_decode($result, true);
        $patronRecord = $patronList;
        return $patronRecord["data"];
    }

    public static function syncPatronToDb() {
        $client = new Client();
        $patronObj = dbSyncController::getPatron();
        foreach ($patronObj as $key => $value){
            try{
                $result = $client->request(
                'POST',
                config('pathConfig.pathAPI').'dbSyncController/insertPatronFromKmuttDB',
                    [
                        'form_params' =>[
                            'StdCode' => $value['StdCode'],
                            'PtnId' => (int)$value['PtnId'],
                            'FName' => $value['FName'],
                            'LName' => $value['LName'],
                            'FNameE' => $value['FNameE'],
                            'LNameE' => $value['LNameE'],
                            'UnivId' => $value['UnivId'],
                            'RFId' => $value['RFId'],
                            'PtnClassId' => (int)$value['PtnClassId'],
                            'PtnGroup' => (int)$value['PtnGroup'],
                            'DeptId' => (int)$value['DeptId'],
                            'FacId' => (int)$value['FacId'],
                            'Exp_Date' => $value['Exp_Date'],
                            'Barcode' => $value['Barcode']
                        ]
                    ]
                )->getBody();
            } catch (Exception $e){
                ;
            }
        }
        $success = "success";
        return $success;
    }
}