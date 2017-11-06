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
                config('pathConfig.pathREST').'checkLogin/check', 
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

            $resultControl = $client->request('GET',config('pathConfig.pathREST').'permControl/'.$userID)->getbody();
            $permControl1 = json_decode($resultControl, true);

            Session::put('permControl1', $permControl1); //Session::get -> Session::put

            $resultReport = $client->request('GET',config('pathConfig.pathREST').'permReport/'.$userID)->getbody();
            $permReport1 = json_decode($resultReport, true);

            Session::put('permReport1', $permReport1); //Session::get -> Session::put

    		return redirect('/dashboard');
    	}
    }
}
