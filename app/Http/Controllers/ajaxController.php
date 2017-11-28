<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller {

   public function post(Request $request){
      $response = array(
          'status' => 'success',
          'msg' => $request->message,
      );
      return response()->json($response); 
   }

   public function index(){
       return view('testajax');
   }

   public function testfunction(Illuminate\Http\Request $request)
   {
       if ($request->isMethod('post')){    
           return response()->json(['response' => 'This is post method']); 
       }

       return response()->json(['response' => 'This is get method']);
   }

    public function call(){
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }

    
    public function myform(){
        return view('testajax');
    }

    public function myformPost(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        if($validator->passes()){
            return response()->json(['success'=>'Added new records.']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}