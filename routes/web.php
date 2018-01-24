<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test',function (){
    return view('GroupManagement.index2');
});

// Route::get('/test3',function (){
//     return view('');
// });

Route::get('/test3', function(){
    return view('GroupManagement.dummy');
});

Route::get('/change/{locale}', function ($locale) {
	Session::put('locale', $locale);
	return Redirect::back();
});

Route::get('/', function () {
    return view('Login.login2');
});

Route::post('/login', 'loginController@checkLoginAPI');

// Route::group(['middleware' => 'checkLogin'], function (){
//     Route::get('/dashboard', function () { return view('Dashboard.index'); });
//     Route::get('/groupmanagement', function () {return view('GroupManagement.index'); });
//     //Route::get('/membermanagement','bdReportController@index');
//     Route::get('/membermanagement','memberController@memberRecord'); 
//     Route::get('/memberregister', function () {return view('Member.register'); });
// });

Route::get('/dashboard', function () { return view('Dashboard.index'); });
//Route::get('/groupmanagement', function () {return view('GroupManagement.index'); });
//Route::get('/membermanagement','bdReportController@index');
//Route::get('/groupmanagement','groupController@groupRecord');
Route::get('/membermanagement','memberController@memberRecord'); 
Route::get('/memberregister', function () { return view('Member.register'); });
Route::post('/memberController/memberSingleInsert', 'memberController@memberSingleInsert');
// Route::post('/memberregister', 'ValidateController@store')->name;

Route::get('/hello', function () { return view('Member.hello'); });
Route::get('/file', function() {return view('Member.file'); });
Route::get('/download', function() {return view('Member.download');});

Route::get('/excelformat', 'Excelcontroller@getFormat');

Route::get('/logout', function(){ Session::flush(); return Redirect::back(); });



Route::resource('post', 'bdReportController');
Route::post('/bdReport/searchKeyword', 'bdReportController@index');
Route::get('/bdReport','bdReportController@index');

Route::resource('post', 'memberController');
Route::get('/memberRecord','memberController@memberRecord');



Route::resource('get', 'groupController');
//Route::get('/groupmanagement', 'groupController@groupRecord');
Route::get('/groupmanagement', 'groupController@groupInitial');
Route::get('/grouptree', 'groupController@groupInitial');


Route::get('/', 'ajaxController@index');
Route::get('/getRequest', function(){
    if(Request::ajax()){
        return 'getRequest returnnnnnnnnnnn';
    }
});

Route::post('/register',function(){
    if(Request::ajax()){
        return Response::json(Request::all());
    }
});
// Route::get('/getRequest' , function(){
//     if(Request::ajax()){
//         return 'getRequest has loaded.';
//     }
// });
// Route::get('/ajax','ajaxController@myform');
// Route::post('/ajax','ajaxController@myformPost');




