<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;
use Session;


class loginController extends Controller
{
    public function checkLoginAPI(Request $request){
    	$username = $request->input('username');
    	$password = $request->input('password');

    	$client = new Client();
    	$result = $client->request(
                'POST',
                config('pathConfig.pathAPI_Login').'checkLogin/check',
                ['form_params' => [
                        'txtUsername' => $username,
                        'txtPassword' => $password
                    ]
                ])->getbody();
    	$userInfo = json_decode($result, true);
    	if($userInfo['status'] == 'FAIL'){
    		return redirect()->back()->withErrors(['failure' => 'The credentials you entered did not match our records. Try again!',]);
    	}else{
            $userID = $userInfo['data']['userID'];
            Session::put('userId',$userID); //Session::get -> Session::put
            Session::put('userInfo',$userInfo); //Session::get -> Session::put

            //Permission Control Session
            $resultControl = $client->request('GET',config('pathConfig.pathAPI_Login').'permControl/'.$userID)->getbody();
            $permControl1 = json_decode($resultControl, true);

            //Report Session
            $resultReport = $client->request('GET',config('pathConfig.pathAPI_Login').'permReport/'.$userID)->getbody();
            $permReport1 = json_decode($resultReport, true);

            //Menu Permission
            $menuPermission = self::menuPermission($userID);
            $menuPermission = $menuPermission;

            if($permControl1["data"]["rc"] == 1){
                Session::put('permControl1', $permControl1); //Session::get -> Session::put
                Session::put('permReport1', $permReport1); //Session::get -> Session::put
                Session::put('menuPermission', $menuPermission);
                return redirect('/dashboard');
            }else if($permControl1["data"]["rc"] == 0){
                Session::flash('error_msg', 'Login Permission Failed! You have no permission to access to Register Center');
                return redirect('/loginPage');
            }
    	}
    }

    public static function menuPermission ($userID) {
        $client = new Client();
        $result = $client->request(
            'GET',
            config('pathConfig.pathAPI').'registerMenuPermission/'.$userID
        )->getbody();
        $permissionResult = json_decode($result, true);
        $permissionList = json_decode($permissionResult["data"][0]["permission_menu"],true);
        return $permissionList;
    }
}
