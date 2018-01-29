<?php use \App\Http\Controllers\memberController; ?>
@extends('core')

@section('activedash')
tabbuttonactive
@endsection

@section('htmlheader_title')
{{ trans('menu.dashboard') }}
@endsection

@section('content')
    <div class="col-md-12">
        {{-- First Column--}}
        <div class="col-md-3">

            <div class="col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ trans('dashboard.all_member')}}</span>
                        <span class="info-box-number"><?php memberNumber(); ?></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Group Number</span>
                            <span class="info-box-number">93,139</span>
                        </div>
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Register Today</span>
                            <span class="info-box-number">93,139</span>
                        </div>
                    </div>
            </div>
        </div>

        {{-- Second Column--}}
        <div class="col-md-6"  style="background-color:blue;">
            <div class="col-md-12">
            </div>
        </div>

        {{-- Third Column--}}
        <div class="col-md-3"  style="background-color:green;">
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection

<?php
function memberNumber(){
    $init_check = true;
    $memberArry = memberController::memberNumber();
    echo($memberArry["data"][0]["NumberOfMember"]); //single print
}
?>