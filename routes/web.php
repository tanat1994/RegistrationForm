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

//DATASYNC
Route::GET('/datasync/syncClassToDb', 'dbSyncController@syncClassToDb');
Route::GET('/datasync/syncGroupToDb', 'dbSyncController@syncGroupToDb');
Route::GET('/datasync/syncFacultyToDb', 'dbSyncController@syncFacultyToDb');
Route::GET('/datasync/syncDeptToDb', 'dbSyncController@syncDeptToDb');
Route::GET('/datasync/syncPatronToDb', 'dbSyncController@syncPatronToDb');

Route::get('/testPermission', 'loginController@menuPermission');

Route::get('/change/{locale}', function ($locale) {
	Session::put('locale', $locale);
	return Redirect::back();
});

Route::get('/loginPage', function () {
    return view('Login.login');
});

Route::post('/login', 'loginController@checkLoginAPI');

// Route::group(['middleware' => 'checkLogin'], function (){
//     Route::get('/dashboard', function () { return view('Dashboard.index'); });
//     Route::get('/groupmanagement', function () {return view('GroupManagement.index'); });
//     //Route::get('/membermanagement','bdReportController@index');
//     Route::get('/membermanagement','memberController@memberRecord'); 
//     Route::get('/memberregister', function () {return view('Member.register'); });
// });
Route::get('/testpage', function(){return view('Member.test');});
Route::get('/dashboard', 'visitorController@visitorCardRecordonDashBoard');
Route::get('/loading', function(){return view('Member.loading');});
//Route::get('/groupmanagement', function () {return view('GroupManagement.index'); });
//Route::get('/membermanagement','bdReportController@index');
//Route::get('/groupmanagement','groupController@groupRecord');
Route::get('/membermanagement','memberController@memberRecord'); 
Route::get('/memberregister', 'visitorController@visitorCardRecord');
Route::get('/cardmanagement', 'visitorController@listAllCard');

Route::post('/groupController/postVisitorCardInsert', 'groupController@postVisitorCardInsert');
Route::post('/memberController/postMemberInsert', 'memberController@postMemberInsert');
Route::post('/memberController/memberSingleInsert', 'memberController@memberSingleInsert');
Route::post('/visitorController/postVisitorCardInsert', 'visitorController@postVisitorCardInsert');
// Route::post('/memberregister', 'ValidateController@store')->name;

Route::post('/visitorController/postVisitorInsert', 'visitorController@postVisitorInsert');

Route::get('/hello', function () { return view('Member.hello'); });
Route::get('/file', function() {return view('Member.file'); });
Route::get('/download', function() {return view('Member.download');});
Route::get('/webcam', function() {return view('Member.webcam');});

Route::get('/excelformat', 'Excelcontroller@getFormat');

Route::get('/logout', function(){ Session::forget('menuPermission'); return Redirect::to('/loginPage'); });



Route::resource('post', 'bdReportController');
Route::post('/bdReport/searchKeyword', 'bdReportController@index');
Route::get('/bdReport','bdReportController@index');

Route::resource('post', 'memberController');
Route::get('/memberRecord','memberController@memberRecord');

Route::get('/newtree2', function(){return view('GroupManagement.newtree2'); });
Route::get('/newtree', function(){return view('GroupManagement.newtree'); });
Route::resource('get', 'groupController');
//Route::get('/groupmanagement', 'groupController@groupRecord');
Route::get('/groupmanagement', 'groupController@groupInitial');
// Route::get('/groupmanagement/{groupName}', function(){return view('GroupManagement.test');});
// Route::get('/grouptree', 'groupController@groupInitial');

Route::get('/blacklist', 'blackListController@getAllBlackList');

//Route::get('/', 'ajaxController@index');
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




