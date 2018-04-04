<?php 
use \App\Http\Controllers\memberController;
use \App\Http\Controllers\visitorController;
use \App\Http\Controllers\customizeController;
?>
<?php
    header('Access-Control-Allow-Origin:*');
?>
@extends('core')

@section('more_script')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/webcam.min.js')}}"></script>
<style>
        .container{
        margin-top:20px;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;    
            color: #333;
            background-color: #fff;
            border-color: #ccc;    
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }

        .val_error{
            color: #FF1F1F;
        }

        .nav-pills > li.active > a,
        .nav-pills > li.active > a:hover,
        .nav-pills > li.active > a:focus {
        border-top-color: <?php echo customizeController::themeColor(); ?>
        }

        .nav-pills > li.active > a,
        .nav-pills > li.active > a:hover,
        .nav-pills > li.active > a:focus {
        color: #ffffff;
        background-color: <?php echo customizeController::themeColor(); ?>
        }

        .tabbutton {
            color: <?php echo customizeController::themeColor(); ?>
        }
        .tabbutton::after{
            background: <?php echo customizeController::themeColor(); ?>
        }
        .tabbuttonactive::after{
            background: <?php echo customizeController::themeColor(); ?>
        }

        .img-thumbnail {
            border : 1px solid #ddd;
            border-radius : 4px;
            padding : 5px;
        }
        .img-thumbnail:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }

        .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus{
            background-color: <?php echo customizeController::themeColor(); ?>;
            border-color: <?php echo customizeController::themeColor(); ?>;
        }
</style>

{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>


{{-- PARSLEY.JS VALIDATOR --}}
<link type="text/css" rel="stylesheet" href="{{asset('css/parsley/parsley.css')}}"></script>
<script src="{{asset('js/parsley/parsley.min.js')}}"></script>
<script> var public_path = "{{asset('/images/visitor_Images/')}}"; </script>
@endsection

@section('htmlheader_title')
{{ trans('register.register') }}
@endsection

@section('activemember')
tabbuttonactive
@endsection

@section('content')
    <?php 
        $permission = Session::get('menuPermission')["rc"]["mm"];
    ?>
    <div class="container-fluid">
        <div class="row-fluid">
        <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>
        <input type="hidden" id="path_public" name="path_public" value="";/>
            <!-- 1st HEADER -->
            <div class="col-md-12">
                <h2 style="color:<?php echo customizeController::themeColor(); ?>;"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:<?php echo customizeController::themeColor(); ?>;"><strong>{{ trans('menu.member') }}</a>  >  {{ trans('register.register') }}</strong></h2>
                <hr class="hrbreakline">
            </div>
            
            <div id="exTab3" class="col-md-12">	
                <div class="col-md-12">
                    <ul class="nav nav-pills">
                            <li class="member_tab" style="font-size:1.5em;">
                                <a href="#member_register" data-toggle="tab"><strong>{{trans('register.member_register')}}</strong></a>
                            </li>
                            <li class="visitor_tab" style="font-size:1.5em;">
                                <a href="#visitor_register" data-toggle="tab"><strong>{{trans('register.visitor_register')}}</strong></a>
                            </li>
                    </ul>
                </div>
                
                

                {{-- Tab Content --}}
                <div class="tab-content clearfix">
                    {{-- Member Section --}}
                    <div class="tab-pane member_section" id="member_register">
                            <div class="col-md-12">
                                    <div class="col-md-8" style="background-color:white;">
                                        <h3 style="float:left"><strong>{{ trans('register.memberinformation') }}</strong></h3>
                                        <!-- <input type="image" src="{{ asset('images/file_upload.png') }}" style="float:right; width:45px; height:45px; margin-top: 6px;" data-toggle="modal" data-target="#myModal"/> -->
                                        <hr class="hrbreakline">
                                            @if(count($errors)>0)
                                                <ul style="padding-left:0px;">
                                                    @foreach($errors->all() as $error)
                                                        <li class="alert alert-danger" style="margin-left:0px;">Error message: <strong><u>{{$error}}</u></strong></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <form class="form-horizontal" method="POST"  name="regis_form" action="{{url('memberController/postMemberInsert')}}" data-parsley-validate="" style="font-size:1.2em;">
                                                <div class="col-md-9">
                                                    {{-- Input form section--}}
                                                    {{-- PATRON ID --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="PtnId" class="control-label col-md-4" style="text-align:left;">{{ trans('register.patronId') }} :</label>
                                                            <div class="col-md-8">
                                                                <input class="form-control input-lg" type="text" style="border-radius: 4 !important;" id="regis_PtnId" name="regis_PtnId" placeholder="{{trans('register.patronId')}}" data-parsley-trigger="keyup" required="">
                                                            </div>
                                                    </div>
                                                    {{-- UNIV ID--}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="UnivId" class="control-label col-md-4" style="text-align:left;">{{ trans('register.univId') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_UnivId" name="regis_UnivId" placeholder="{{trans('register.univId')}}" data-parsley-trigger="change" required="">
                                                            </div>
                                                    </div>

                                                    {{-- RFID--}}
                                                    <div class="form-group row">
                                                            <label for="rfid" class="control-label col-md-4" style="text-align:left;">RFID :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control  input-lg" id="regis_rfid" name="regis_rfid" placeholder="RFID" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>

                                                    {{-- BARCODE --}}
                                                    <div class="form-group row">
                                                            <label for="rfid" class="control-label col-md-4" style="text-align:left;">BARCODE :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control  input-lg" id="regis_barcode" name="regis_barcode" placeholder="BARCODE" data-parsley-trigger="change" required="">
                                                            </div>
                                                    </div>

                                                    {{-- PtnClassId --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="PtnClassId" class="control-label col-md-4" style="text-align:left;">{{ trans('register.patronclass') }} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_PtnClassId" class="form-control input-lg" name="regis_PtnClassId">
                                                                    <?php PatronClassList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- title --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="title" class="control-label col-md-4" style="text-align:left;">{{ trans('register.title')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_titleId" class="form-control input-lg" name="regis_titleId">
                                                                    <option selected value="1">{{ trans('register.title_mr') }}</option>
                                                                    <option value="2">{{ trans('register.title_mrs') }}</option>
                                                                    <option value="3">{{ trans('register.title_ms') }}</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- FName --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="FName" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_name" name="regis_name" placeholder="{{ trans('register.firstname') }}" data-parsley-trigger="change" required="">
                                                                <div id="name_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                                                    {{-- lastname --}}
                                                    <div class="form-group row">
                                                            <label for="LName" class="control-label col-md-4" style="text-align:left;">{{ trans('register.lastname') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_lastname" name="regis_lastname" placeholder="{{ trans('register.lastname') }}" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>

                                                    {{-- Address-1 --}}
                                                    <div class="form-group row">
                                                            <label for="address1" class="control-label col-md-4" style="text-align:left;">{{ trans('register.address') }} 1 :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_address1" name="regis_address1" placeholder="{{trans('register.address')}} 1" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                                                    {{-- Address-2 --}}
                                                    <div class="form-group row">
                                                            <label for="address2" class="control-label col-md-4" style="text-align:left;">{{ trans('register.address') }} 2 :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_address2" name="regis_address2" placeholder="{{trans('register.address')}} 2" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                                                    {{-- Address-3 --}}
                                                    <div class="form-group row">
                                                            <label for="address3" class="control-label col-md-4" style="text-align:left;">{{ trans('register.address') }} 3 :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_address3" name="regis_address3" placeholder="{{trans('register.address')}} 3" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>

                                                    {{-- Phone1--}}
                                                    <div class="form-group row">
                                                            <label for="phone1" class="control-label col-md-4" style="text-align:left;">{{ trans('register.phone_number') }} 1 :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_Phone1" name="regis_Phone1" placeholder="{{ trans('register.phone_number')}} 1 " data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>

                                                    {{-- Phone2--}}
                                                    <div class="form-group row">
                                                            <label for="phone2" class="control-label col-md-4" style="text-align:left;">{{ trans('register.phone_number') }} 2 :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_Phone2" name="regis_Phone2" placeholder="{{ trans('register.phone_number') }} 2" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>

                                                    {{-- Email--}}
                                                    <div class="form-group row">
                                                            <label for="email" class="control-label col-md-4" style="text-align:left;">{{ trans('register.email') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-lg" id="regis_email" name="regis_email" placeholder="example@example.com" data-parsley-trigger="change" required="">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                
                                                    {{-- faculty --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="faculty" class="control-label col-md-4" style="text-align:left;">{{ trans('register.faculty')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_faculty" class="form-control input-lg" name="regis_faculty">
                                                                    {{--  <option value="" selected="selected">Faculty</option>  --}}
                                                                    <?php FacultyList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>

                                                    {{-- department --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="dept" class="control-label col-md-4" style="text-align:left;">DEPARTMENT :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_dept" class="form-control input-lg" name="regis_dept">
                                                                    <?php DeptList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>

                                                    {{-- group --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="group" class="control-label col-md-4" style="text-align:left;">PATRON GROUP :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_group" class="form-control input-lg" name="regis_group">
                                                                    <?php DeptList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>
                
                                                    {{-- expire_date--}}
                                                    <div class="form-group row">
                                                            <label for="expire_date" class="control-label col-md-4" style="text-align:left;">EXPIRE DATE :</label>
                                                            <div class="col-md-8">
                                                                <input type="date" class="form-control input-lg" id="regis_expire_date" name="regis_expire_date" placeholder="" data-parsley-trigger="change" required="">
                                                            </div>
                                                    </div>
                                                    {{ csrf_field() }}
                                                    <div><button type="submit" onclick="successAlert();" class="btn btn-success pull-right btn-lg" id="submit" style="margin-bottom:4%;">{{trans('register.submit_register')}}</button></div>  
                                                </div>
                                                <div class="col-md-7">&nbsp;</div>
                                            </form>
                    
                                        <!-- 2nd HEADER-->
                                        <!--<div class="col-md-12" style="padding-left:0px;">
                                            <h3 style="float:left"><strong>{{ trans('register.memberinformation') }}</strong></h3>
                                            <hr class="hrbreakline">
                    
                                            <form class="form-horizontal" action="" method="post">
                                                    <div class="col-md-5">
                                                        {{-- Input form section --}}
                                                        <div class="form-group row" style="position:relative;">
                                                            <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }} :</label>
                                                            <div class="col-md-8">
                                                            <input type="text" class="form-control" id="regis_name" name="regis_name" placeholder="{{ trans('register.firstname') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.surname') }} :</label>
                                                            <div class="col-md-8">
                                                            <input type="text" class="form-control" id="regis_surname" name="regis_surname" placeholder="{{ trans('register.surname') }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.dateofbirth') }} :</label>
                                                            <div class="col-md-8">
                                                            <input type="text" class="form-control" id="regis_surname" name="regis_surname" placeholder="demo input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">&nbsp;</div>
                                            </form>
                                        </div>-->
                    
                                    </div>
                    
                                    {{-- Embedded Device Section --}}
                                    <!-- <div class="col-md-4" style="background-color: #F5F5F5; padding-right:0;">
                                        <div class="col-md-12" style="background-color: white;">
                                            <div class="col-md-1">&nbsp;</div>
                                                <div class="col-md-10" style="background-color:red;">
                                                    <img src="{{ asset('images/demo.png') }}" class="img-responsive" />
                                                </div>
                                            <div class="col-md-1">&nbsp;</div>
                                        </div>
                    
                                        {{-- Member Webcam--}}
                                        <div class="col-md-12" style="background-color:white;">
                                            <div class="col-md-1">&nbsp;</div>
                                            <div class="col-md-10" style="background-color:;padding-bottom:3%;">
                                                <input type="button" class="btn btn-primary btn-block btn-flat" value="TAKE A PICTURE"/>
                                            </div>
                                            <div class="col-md-1">&nbsp;</div>
                                        </div>
                                    </div> {{-- End Embedded Device Section--}} -->
                                </div>
                    
                                    <!--*************** MODAL SECTION *************-->
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-md">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                    
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h2 class="modal-title" style="color:#2e7ed0;"><strong>IMPORT AS FILE</strong></h2>
                                                    </div>
                    
                                                        <div class="modal-body">
                                                            <form class="form-horizontal">
                                                                <div class="form-group" style="margin-left: 1%;">
                                                                    <div class="input-group">
                                                                        <h4><strong>{{trans('register.importfile')}}</strong></h4>
                    
                                                                            {{-- INPUT FILE SECTION --}}
                                                                            <div class="container">
                                                                                <div class="row-fluid">
                                                                                    <div class="col-xs-12 col-md-4 ">  
                                                                                        <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                                        <div class="input-group image-preview">
                                                                                            <input type="text" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
                                                                                            <span class="input-group-btn">
                                                                                                <!-- image-preview-clear button -->
                                                                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                                                                </button>
                                                                                                <!-- image-preview-input -->
                                                                                                <div class="btn btn-default image-preview-input">
                                                                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                                                                    <span class="image-preview-input-title">{{trans('register.choosefile')}}</span>
                                                                                                    <input type="file" name="input-file-preview"/> <!-- rename it -->
                                                                                                </div>
                                                                                            </span>
                                                                                        </div><!-- /input-group image-preview [TO HERE]--> 
                                                                                        <p style="margin-top:5px;">** <a href="{{URL::to('excelformat')}}">{{trans('register.clickhere')}}</a> {{trans('register.downloadimportformat')}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>{{-- END FILE SECTION --}}
                                                                    </div>
                                                                </div>         
                                                            </form>
                                                        </div> 
                    
                                                        
                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                    
                                                </div>
                                            
                                            </div>
                                        </div>
                                    <!--***************  END MODAL SECTION *************-->
                    </div>{{-- End Member Section--}}
                    
                    {{-- Visitor Section --}}
                    <div class="tab-pane visitor_section" id="visitor_register">
                        <div class="col-md-12">
                            <div class="col-md-7" style="background-color:white">
                                    <h3 style="float:left"><strong>{{trans('register.visitorInfo')}}</strong></h3>
                                    <hr class="hrbreakline">
                                        @if(count($errors)>0)
                                            <ul style="padding-left:0px;">
                                                @foreach($errors->all() as $error)
                                                    <li class="alert alert-danger" style="margin-left:0px;">Error message: <strong><u>{{$error}}</u></strong></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <form class="form-horizontal visitor_regis_form" method="POST" name="visitor_regis_form" action="{{url('visitorController/postVisitorInsert')}}" data-parsley-validate="" onsubmit="return isRecorded();" style="font-size:1.2em;">
                                            <div class="col-md-11">
                                                {{-- Input form section--}}
                                                {{-- national ID || passport ID --}}
                                                <div class="form-group row" style="position:relative;">
                                                    <label for="" class="control-label col-md-4" style="text-align:left;">{{trans('register.nationnalId')}} :</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-lg" id="regis_visitor_cardId" name="regis_visitor_cardId" placeholder="{{trans('register.nationnalId')}}" data-parsley-trigger="change" required="" data-parsley-errors-container="#regis_visitor_cardId_error"/>
                                                            <span class="input-group-btn">
                                                                <input type="button" onclick="search_vis_data();" class="form-control btn input-lg" id="vis_cardId_search" name="vis_cardId_search" value="{{trans('register.search')}}" style="font-size:20px;background-color:<?php echo customizeController::themeColor(); ?>;color:white;">
                                                                <!-- <button class="form-control"><i class="fa fa-user"></i></button> -->
                                                            </span>
                                                        </div>
                                                        <div id="regis_visitor_cardId_error"></div>
                                                    </div>
                                                </div>

                                                {{-- user type --}}
                                                <div class="form-group row" style="position:relative;">
                                                    <label for="type" class="control-label col-md-4" style="text-align:left;">{{trans('register.user_type')}} :</label>
                                                    <div class="col-md-8">
                                                    <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                        <select id="regis_visitor_type" class="form-control input-lg" name="regis_visitor_type">
                                                            <!-- <option selected value="Visitor">Visitor</option> -->
                                                            <?php PatronClassList(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Automatic Card --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="regis_visitor_card_at" class="control-label col-md-4" style="text-align:left;">{{trans('register.visitor_card')}}: </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control input-lg" id="vis_card_search" name="vis_card_search" placeholder="PLACE CARD ON MINI STAFF" data-parsley-trigger="change">
                                                        </div>
                                                </div>
                                                <script>
                                                    $('#vis_card_search').on('change', function(){
                                                        // console.log(document.getElementById('vis_card_search').value);
                                                        var cardUID = document.getElementById('vis_card_search').value;
                                                        $.ajax({
                                                            url : $('#api_url').val()+'cardController/searchCard',
                                                            type : 'post',
                                                            data : {cardUID: cardUID},
                                                            success : function(response){
                                                                if(response.length > 0){
                                                                    // swal({
                                                                    //     title: "Founded!",
                                                                    //     text: "We've found the card",
                                                                    //     icon: "success"
                                                                    // });
                                                                    // document.getElementById("regis_visitor_card selet").value = response[0]["cardName"];
                                                                    $('#regis_visitor_card').val(response[0]["cardUID"]).change();
                                                                }
                                                                else{
                                                                    swal({
                                                                        title: "Not Found!",
                                                                        icon: "warning"
                                                                    });
                                                                }
                                                            }
                                                        });  
                                                    });
                                                </script>


                                                {{-- Card Type--}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="regis_visitor_card" class="control-label col-md-4" style="text-align:left;">{{trans('register.visitor_card')}}: </label>
                                                        <div class="col-md-8">
                                                            <select id="regis_visitor_card" class="form-control input-lg" name="regis_visitor_card" required="" >
                                                                <option value="" disabled selected>{{trans('register.select_card')}}</option>
                                                                <?php visitorCardList(); ?>
                                                            </select>
                                                        </div>
                                                </div>

                                                {{-- title --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="title" class="control-label col-md-4" style="text-align:left;">{{ trans('register.title')}} :</label>
                                                        <div class="col-md-8">
                                                        <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                            <select id="regis_visitor_titleId" class="form-control input-lg" name="regis_visitor_titleId">
                                                                <option selected value="1">{{ trans('register.title_mr') }}</option>
                                                                <option value="2">{{ trans('register.title_mrs') }}</option>
                                                                <option value="3">{{ trans('register.title_ms') }}</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                {{-- EN-firstname --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="vis_name_en" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }}(EN):</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control input-lg" id="vis_name_en" name="vis_name_en" placeholder="{{ trans('register.firstname') }}" data-parsley-trigger="change" required="">
                                                            <div id="vis_name_en_error" class="val_error"></div>
                                                        </div>
                                                </div>
                                                {{-- EN-lastname --}}
                                                <div class="form-group row">
                                                        <label for="vis_lastname_en" class="control-label col-md-4" style="text-align:left;">{{ trans('register.lastname') }}(EN):</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control input-lg" id="vis_lastname_en" name="vis_lastname_en" placeholder="{{ trans('register.lastname') }}" data-parsley-trigger="change" required="">
                                                            <div id="vis_lastname_en_error" class="val_error"></div>
                                                        </div>
                                                </div>
                                                {{-- TH-firstname --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="vis_name_th" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }}(TH):</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control input-lg" id="vis_name_th" name="vis_name_th" placeholder="{{ trans('register.firstname') }}" data-parsley-trigger="change" required="">
                                                            <div id="vis_name_th_error" class="val_error"></div>
                                                        </div>
                                                </div>
                                                
                                                {{-- TH-lastname --}}
                                                <div class="form-group row">
                                                        <label for="vis_lastname_th" class="control-label col-md-4" style="text-align:left;">{{ trans('register.lastname') }}(TH):</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control input-lg" id="vis_lastname_th" name="vis_lastname_th" placeholder="{{ trans('register.lastname') }}" data-parsley-trigger="change" required="">
                                                            <div id="vis_lastname_th_error" class="val_error"></div>
                                                        </div>
                                                </div>

                                                {{-- Date of Birth --}}
                                                <div class="form-group row">
                                                    <label for="date_of_birth" class="control-label col-md-4" style="text-align:left;">DATE OF BIRTH:</label>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control input-lg" id="vis_date_of_birth" name="vis_date_of_birth" placeholder="" data-parsley-trigger="change" required="">
                                                    </div>
                                                </div>

                                                {{-- Address --}}
                                                <div class="form-group row" style="position:relative;">
                                                    <label for="regis_visitor_address" class="control-label col-md-4" style="text-align:left;">{{trans('register.address')}} :</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control input-lg" id="regis_visitor_address" name="regis_visitor_address" placeholder="{{trans('register.address')}}" data-parsley-trigger="change" required="">
                                                        <div id="vis_address_error" class="val_error"></div>
                                                    </div>
                                                </div>

                                                {{-- WebCam --}}
                                                <div class="form-group row" style="position:relative;">
                                                    <label for="regis_visitor_webcam" class="control-label col-md-4" style="text-align:left;">{{trans('register.visitor_image')}} :</label>
                                                    <div class="col-md-8">
                                                        <button id="webcam_event" type="button" data-toggle="modal" onClick="webCamTrigger();" data-target="#webCamModal" style="border-radius : 4px;"><i class="fa fa-2x fa-camera" style="text-align:center;margin-top:25%;"></i></button>
                                                        <div id="webcam_result" style="margin-top: 2%;"></div>
                                                        <input type="hidden" id="visitor_image_input" name="visitor_image_input" value=""/>
                                                    </div>
                                                </div>

                                                {{-- Flag Variable --}}
                                                <input type="hidden" id="regis_visitor_total" name="regis_visitor_total" value="1"/>
                                                <input type="hidden" id="regis_visitor_flag" name="regis_visitor_flag" value="0"/>
                                                {{-- expire_date--}}
                                                {{ csrf_field() }}
                                                <div><button type="submit" class="btn btn-success pull-right btn-lg" id="submit" style="margin-bottom:4%;">{{trans('register.submit_register')}}</button></div>  
                                            </div>
                                            
                                            <div class="col-md-7">&nbsp;</div>
                                        </form>
                            </div>

                            <div class="col-md-5">
                                <?php $null_status_record = 0; ?>
                                <div class="col-md-12" style="background-color:white;">
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <table class="table table-striped table-bordered table-hover display" id="visitorTable" cellspacing="0">
                                        <thead id="table_header">
                                            <tr style="background-color:<?php echo customizeController::themeColor(); ?>">
                                                <th nowrap style="color:white;">{{trans('register.visitorNo')}}</th>
                                                <th nowrap style="color:white;">{{trans('register.visitorCardName')}}</th>
                                                <th nowrap style="color:white;">{{trans('register.visitorId')}}</th>
                                                <th nowrap style="color:white;">{{trans('register.visitorName')}}</th>
                                                <th nowrap style="color:white;">ACTION</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php $null_status_record = 0; 
                                                      $iterator = 1; ?>
                                                @foreach($borrowRecord as $record)
                                                        <tr>
                                                            <td><?php echo $iterator; ?></td>
                                                            <td>{{$record['cardName']}}</td>
                                                            <td>{{$record['visitorId']}}</td>
                                                            <td>{{$record['regis_fname_en']}}</td>
                                                            <!-- <td><a data-role="card_return" data-id="{{$record['cardId']}}">Return the card</a></td> -->
                                                            <td style="text-align:center;"><a data-role="card_return" data-id="{{$record['cardUID']}}"><input type="image" src="{{ asset('images/card_return.png') }}" style="width:35px; height:35px; margin-top: 0.5%; margin-bottom: 1%;"  id="card_return"/></a></td>
                                                            <?php $iterator++; ?>
                                                        </tr>
                                                @endforeach
                                            
                                        </tbody>

                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            {{-- Modal Webcam --}}
                                <div class="modal fade" id="webCamModal" role="dialog">
                                        <div class="modal-dialog modal-md"> 
                                            <!-- Modal content-->
                                            <div class="modal-content">
                
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" id="modal_close" onClick="modalCloseTrigger();">&times;</button>
                                                    <h2 class="modal-title" style="color:#2e7ed0;"><strong>{{trans('register.visitor_image')}}</strong></h2>
                                                </div>
                
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="col-xs-12 col-md-5" style="margin-left:2%;">  
                                                                <div class="form-group row" style="position:relative;" id="section_webcam_client_load">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-10">
                                                                        <div id="live_webcam" class="center-block"></div>

                                                                        <div id="pre_take_button" style="margin-top: 5%;">
                                                                            <input type="button" class="btn btn-primary center-block" value="{{trans('register.take_snapshot')}}" onclick="previewSnapshot();"/>
                                                                        </div>
                                                                        <div id="post_take_button" style="display: none; margin-top: 5%;">
                                                                            <input type="button" class="btn btn-primary center-block" value="{{trans('register.take_another')}}" onclick="cancel_preview();"/>
                                                                            <input type="button" class="btn btn-success center-block" value="{{trans('register.save_photo')}}" onclick="save_photo();" style="margin-top:3%;"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1"></div>
                                                                </div>
                                                        
                                                            </div>
                                                        </div>        
                                                    </div> 
                    
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                            {{-- End Modal Webcam --}}

                            {{-- Disable --}}
                                {{-- Card Type --}}
                                <!-- <script>
                                    $(document).ready(function(){
                                        var null_status_record = <?php echo $null_status_record; ?>;
                                        var cardtype_select = document.getElementById("regis_cardtype");
                                        var cardtype_list = ["Visitor Card", "BLAH", "BLUH"];
                                        var iterator = 1;
                                        for(var i=0; i<cardtype_list.length; i++){
                                            var option = document.createElement("option");
                                            option.value = iterator++;
                                            if(cardtype_list[i] == "Visitor Card"){
                                                option.innerHTML = cardtype_list[i] + " ( " + null_status_record + " lefts )";
                                            }
                                            else{
                                                option.innerHTML = cardtype_list[i];
                                            } 
                                            cardtype_select.appendChild(option);
                                        }
                                    });
                                </script> -->
                                {{-- End Card Type --}}
                            {{-- Disable --}}


                            <script>
                                function search_vis_data () {
                                    var vis_national_card = document.getElementById("regis_visitor_cardId").value; 
                                    $.ajax({
                                        url : $('#api_url').val()+'visitorController/searchVisitorById',
                                        //url:  config('pathConfig.pathREST') +'checkLogin/check'
                                        type : 'post',
                                        data : {visitor_card_id: vis_national_card},
                                        success : function(response){
                                            if(response.length > 0){
                                                swal({
                                                    title: "Founded!",
                                                    text: "We've found the record",
                                                    icon: "success"
                                                });

                                                document.getElementById("vis_name_en").value = response[0]["regis_fname_en"];
                                                document.getElementById("vis_lastname_en").value = response[0]["regis_lname_en"];
                                                document.getElementById("vis_name_th").value = response[0]["regis_fname_th"];
                                                document.getElementById("vis_lastname_th").value = response[0]["regis_lname_th"];
                                                document.getElementById("regis_visitor_address").value = response[0]["regis_address"];
                                                $total_registration = parseInt(response[0]["regis_total"]) + 1;
                                                document.getElementById("regis_visitor_total").value = $total_registration;
                                                document.getElementById("regis_visitor_flag").value = 1;
                                                document.getElementById("webcam_result").innerHTML = '<img src="'+public_path+'/'+response[0]["regis_img_camera"]+'"/>';
                                            }
                                            else{
                                                swal({
                                                    title: "Not Found!",
                                                    text: "NationnalId or PassportId does not exist in our table!",
                                                    icon: "warning"
                                                });
                                                document.getElementById("regis_visitor_total").value = 1;
                                                document.getElementById("regis_visitor_flag").value = 0;
                                            }
                                        }
                                    });  
                                }
                            </script>

                        </div>
                    </div>
                    
                    {{-- End Visitor Section --}}


                </div> {{-- End Tab Content --}}
            </div> {{-- End Tab Pills --}}
            @if(strpos($permission, 'add_member') !== false)
                <script>
                    $('.member_tab').addClass('active');
                    $('.member_section').addClass('active');
                </script>
                @if(strpos($permission, 'add_visitor') !== false)
                <script></script>
                @else
                    <script>
                        $('.visitor_tab').hide();
                    </script>
                @endif
            @else
                <script>
                    $('.member_tab').hide();
                    $('.visitor_tab').addClass('active');
                    $('.visitor_section').addClass('active');
                </script>       
            @endif

            
        </div>
    </div> {{-- End Container --}}
    
    
    <?php
        // function DegreeList(){
        //     $init_check = true;
        //     $degreeArry = memberController::degreeList();
        //     //echo($st["data"][0]["degreeId"]); //single print
        //     foreach ($degreeArry["data"] as $key => $value){
        //         if($init_check == true){
        //             echo "<option selected value=".$value["degreeId"].">".$value["degreeName"]."</option>";
        //             $init_check = false;
        //         }else{
        //             echo "<option value=".$value["degreeId"].">".$value["degreeName"]."</option>";
        //         }
        //     }
        // }
        // function FacultyList(){
        //     $init_check = true;
        //     $facArry = memberController::facultyList();
        //     foreach ($facArry["data"] as $key => $value){
        //         if($init_check == true){
        //             echo "<option selected value=".$value["facultyId"].">".$value["facultyId"]."-".$value["facultyName"]."</option>";
        //             $init_check = false;
        //         }else{
        //             echo "<option value=".$value["facultyId"].">".$value["facultyId"]."-".$value["facultyName"]."</option>";
        //         }
        //     }
        // }
        // function MajorList(){
        //     $init_check = true;
        //     $majorArray = memberController::majorList();
        //     foreach ($majorArray["data"] as $key => $value){
        //         if($init_check == true){
        //             echo "<option selected value=".$value["majorId"].">".$value["majorName"]."</option>";
        //             $init_check = false;
        //         }else{
        //             echo "<option value=".$value["majorId"].">".$value["majorName"]."</option>";
        //         }
        //     }
        // }

        function visitorCardList() {
            $visitorCardLists = visitorController::listAllVisitorCard();
            foreach($visitorCardLists as $record){
                echo "<option value=".$record["cardUID"].">".$record["cardName"]."</option>";
            }
        }
    ?>

<script>
    //get object
    var regis_cardUID = document.forms["regis_form"]["regis_cardUID"];
    
    //Error section
    var cardUID_error = document.getElementById("cardUID_error");
    var name_error = document.getElementById("name_error");
    var memberId_error = document.getElementById("memberId_error");
    var lastname_error = document.getElementById("lastname_error");

    //Event
    //regis_cardUID.addEventListener("blur", cardUIDVerify, true);

    function successAlert(){
        swal("Good job", "Success Registration", "success");
    }

    function FormValidation(){
        if(regis_cardUID.value=""){
            regis_cardUID.style.border = "1px solid red";
            cardUID_error.textContent = "CardUID is required";
            return false;
        }
    }

    function cardUIDVerify(){
        if(regis_cardUID.value != ""){
            cardUID_error.innerHTML = "";
            successAlert();
            return true;
        }
    }

    function checkForm(form){
        var false_score = 0;
        if(form.regis_cardUID.value == ""){
            form.regis_cardUID.style.border = "1px solid red";
            cardUID_error.textContent = "CardUID is required";
            false_score++;
        }
        if(form.regis_memberId.value == ""){
            form.regis_memberId.style.border =  "1px solid red";
            memberId_error.textContent = "memberId is required";
            false_score++;
        }
        if(form.regis_name.value == ""){
            form.regis_name.style.border = "1px solid red";
            name_error.textContent = "firstname is required";
            false_score++;
        }
        if(form.regis_lastname.value == ""){
            form.regis_lastname.style.border = "1px solid red";
            lastname_error.textContent = "lastname is required";
            false_score++;
        }

        if(false_score > 0){
            false_score = 0;
            return false;
        }else{
            successAlert();
            return true;
        }
    }
</script>

    {{-- Webcam Script--}}
        <script language="JavaScript">

            function previewSnapshot () {
                Webcam.freeze();
                document.getElementById('pre_take_button').style.display = 'none';
                document.getElementById('post_take_button').style.display = '';
            }

            function cancel_preview () {
                Webcam.unfreeze();
                document.getElementById('pre_take_button').style.display = '';
                document.getElementById('post_take_button').style.display = 'none';
            }

            function save_photo () {
                Webcam.snap( function(data_uri) {
                    Webcam.freeze();
                    document.getElementById('pre_take_button').style.display = 'none';
                    document.getElementById('post_take_button').style.display = '';

                    var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                    document.getElementById('visitor_image_input').value = raw_image_data;
                    console.log(document.getElementById('visitor_image_input').value);
                    document.getElementById('webcam_result').innerHTML = '<img id="visitor_image" class="img-thumbnail" src="'+data_uri+'"/>';
                    Webcam.reset();
                    $('#webCamModal').modal('toggle');
                });
            }

            function modalCloseTrigger() {
                Webcam.reset();
            }

            function webCamTrigger() {
                Webcam.set({
                    width: 320,
                    height: 240,
                    dest_width: 320,
                    dest_height: 240,
                    image_format: 'jpeg',
                    jpeg_quality: 90,
                    fps: 30
                });
                Webcam.attach( '#live_webcam' );
            }
            
            function take_snapshot() {
                Webcam.snap( function(data_uri) {
                    document.getElementById('webcam_result').innerHTML = '<a target="_blank" href="'+data_uri+'"><img id="visitor_image" class="img-thumbnail" src="'+data_uri+'"/></a>';
                    var visitor_pic = document.getElementById('visitor_image_input').src;
                } );
            }
        </script>
    {{-- End Webcam Script--}}

{{-- Form Validator --}}
<script>
        // $('#regis_form').parsley().on('field:validated', function () {
        // })
        // .on('form:submit', function() {
        //     return true;
        // });

    function isRecorded () {
        var visitor_cardId = document.getElementById('regis_visitor_cardId').value;
        var hasVisited = false;
        $.ajax({
            url : $('#api_url').val() + 'cardController/hasVisited',
            type : 'post',
            async: false,
            data : {cardId: visitor_cardId},
            success : function(response){
                hasVisited = response;
            }
        });
        if(hasVisited == false){
            // alert("no record get false" + hasVisited);
            swal({ title: "Success!",
                    text: "Register Success",
                    icon: "success"
                });
            return true;
        }else{
            swal({
                title: "Warning!",
                text: "VisitorId: " + visitor_cardId + " had taken the VisitorCard",
                icon: "error"
            });
            return false;
        }
    }
</script>
{{-- End Form Validator --}}

        {{-- Card Return --}}
        <script>
            $(document).ready(function(){
                $(document).on('click', 'a[data-role=card_return]', function(){
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            var visitor_cardUId = $(this).data('id');
                            $.ajax({
                                url : $('#api_url').val() + 'cardController/returnCard',
                                type : 'put',
                                data : {cardUID: visitor_cardUId},
                                success : function(response){
                                    swal({
                                        title: "Thank You!",
                                        text: "VisitorCard has been returned!",
                                        icon: "success"
                                    })
                                    setTimeout( function () {location.reload();}, 1000);
                                }
                            });
                        } else {
                            ;
                        }
                    });
                });
            });
        </script>

{{-- Datatable Section --}}
<script>
    $(document).ready(function(){
        $('#visitorTable').dataTable({
            language: {
                paginate: {
                    previous: "{{trans('table.previous')}}",
                    next: "{{trans('table.next')}}"
                },
                aria: {
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    }
                },
                "search" : "{{trans('table.search')}}:",
                "searchPlaceholder" : "{{trans('table.search')}}",
                "info" : "{{trans('table.showing')}} _START_ {{trans('table.to')}} _END_ {{trans('table.of')}} _TOTAL_ {{trans('table.entries')}}",
                "infoEmpty" : "{{trans('table.showing')}} 0 {{trans('table.to')}} 0 {{trans('table.of')}} 0 {{trans('table.entries')}}",
                "lengthMenu" : "{{trans('table.show')}} _MENU_ {{trans('table.entries')}}",
            },
        });
        //"scrollX": true
    });
</script>
{{-- End Datatable Section--}}

@endsection

@section('extra_script')
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>
@endsection

<?php
    function DeptList(){
        $init_check = true;
        $facArry = memberController::deptList();
        $language = checkLocale();
        foreach ($facArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["DeptCode"].">".$value[$language]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["DeptCode"].">".$value[$language]."</option>";
            }
        }
    }
    function FacultyList(){
        $init_check = true;
        $facArry = memberController::facultyList();
        $language = checkLocale();
        foreach ($facArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["FacCode"].">".$value[$language]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["FacCode"].">".$value[$language]."</option>";
            }
        }
    }
    function GroupList(){
        $init_check = true;
        $facArry = memberController::groupList();
        $language = checkLocale();
        foreach ($facArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["PtnGroupId"].">".$value[$language]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["PtnGroupId"].">".$value[$language]."</option>";
            }
        }
    }

    function PatronClassList(){
        $init_check = true;
        $classArry = memberController::classList();
        $language = checkLocale();
        foreach ($classArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["PtnClassId"].">".$value["Th_Name"]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["PtnClassId"].">".$value["Th_Name"]."</option>";
            }
        }
    }
    
    function checkLocale() {
        if(App::getLocale() == 'en'){ 
            return "En_Name";
        }else{
            return "Th_Name";
        }
    }
?>
