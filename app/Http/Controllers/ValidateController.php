<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        dd($request);
        $this->validate($request, []);
    }
}
