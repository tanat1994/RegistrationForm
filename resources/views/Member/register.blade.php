<?php use \App\Http\Controllers\memberController; ?>
@extends('core')

@section('more_script')
<script src="{{asset('js/sweetalert.min.js')}}"></script>
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
</style>

{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>
@endsection

@section('htmlheader_title')
{{ trans('register.register') }}
@endsection

@section('activemember')
tabbuttonactive
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
        <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>
            <!-- 1st HEADER -->
            <div class="col-md-12">
                <h2 style="color:#2e7ed0;"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.member') }}</a>  >  {{ trans('register.register') }}</strong></h2>
                <hr class="hrbreakline">
            </div>
            
            <div id="exTab3" class="col-md-12">	
                <div class="col-md-12">
                    <ul  class="nav nav-pills">
                        <li class="active">
                            <a  href="#member_register" data-toggle="tab"><strong>MEMBER REGISTER</strong></a>
                        </li>
                        <li>
                            <a href="#visitor_register" data-toggle="tab"><strong>VISITOR REGISTER</strong></a>
                        </li>
                    </ul>
                </div>

                {{-- Tab Content --}}
                <div class="tab-content clearfix">
                    {{-- Member Section --}}
                    <div class="tab-pane active" id="member_register">
                            <div class="col-md-12">
                                    <div class="col-md-8" style="background-color:white;">
                                        <h3 style="float:left"><strong>{{ trans('register.memberinformation') }}</strong></h3>
                                        <input type="image" src="{{ asset('images/file_upload.png') }}" style="float:right; width:45px; height:45px; margin-top: 6px;" data-toggle="modal" data-target="#myModal"/>
                                        <hr class="hrbreakline">
                                            @if(count($errors)>0)
                                                <ul style="padding-left:0px;">
                                                    @foreach($errors->all() as $error)
                                                        <li class="alert alert-danger" style="margin-left:0px;">Error message: <strong><u>{{$error}}</u></strong></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <form class="form-horizontal" method="POST"  name="regis_form" action="{{url('memberController/postMemberInsert')}}"> {{--  action="{{ url('memberController/memberSingleInsert') }}"  --}}
                                                <div class="col-md-5">
                                                    {{-- Input form section--}}
                                                    {{-- cardUID --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="cardUID" class="control-label col-md-4" style="text-align:left;">{{ trans('register.cardUID') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" id="regis_cardUID" name="regis_cardUID" placeholder="{{ trans('register.cardUID') }}">
                                                                <div id="cardUID_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                                                    {{-- memberId--}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.memberId') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" id="regis_memberId" name="regis_memberId" placeholder="{{ trans('register.memberId') }}">
                                                                <div id="memberId_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                                                    {{-- position --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="position" class="control-label col-md-4" style="text-align:left;">{{ trans('register.position')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_position" class="form-control" name="regis_position">
                                                                    <option selected value="1">{{ trans('register.position_student') }}</option>
                                                                    <option value="2">{{ trans('register.position_staff') }}</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- title --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="title" class="control-label col-md-4" style="text-align:left;">{{ trans('register.title')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_titleId" class="form-control" name="regis_titleId">
                                                                    <option selected value="1">{{ trans('register.title_mr') }}</option>
                                                                    <option value="2">{{ trans('register.title_mrs') }}</option>
                                                                    <option value="3">{{ trans('register.title_ms') }}</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- firstname --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" id="regis_name" name="regis_name" placeholder="{{ trans('register.firstname') }}">
                                                                <div id="name_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                                                    {{-- lastname --}}
                                                    <div class="form-group row">
                                                            <label for="lastname" class="control-label col-md-4" style="text-align:left;">{{ trans('register.lastname') }} :</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" id="regis_lastname" name="regis_lastname" placeholder="{{ trans('register.lastname') }}">
                                                                <div id="lastname_error" class="val_error"></div>
                                                            </div>
                                                    </div>
                
                                                    {{-- degree --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="degree" class="control-label col-md-4" style="text-align:left;">{{ trans('register.degree')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_degree" class="form-control" name="regis_degree">
                                                                        <?php degreeList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>
                
                                                    {{-- faculty --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="faculty" class="control-label col-md-4" style="text-align:left;">{{ trans('register.faculty')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_faculty" class="form-control" name="regis_faculty">
                                                                    {{--  <option value="" selected="selected">Faculty</option>  --}}
                                                                    <?php facultyList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- major --}}
                                                    <div class="form-group row" style="position:relative;">
                                                            <label for="major" class="control-label col-md-4" style="text-align:left;">{{ trans('register.major')}} :</label>
                                                            <div class="col-md-8">
                                                            <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                                <select id="regis_major" class="form-control" name="regis_major">
                                                                    <?php majorList(); ?>
                                                                </select>
                                                            </div>
                                                    </div>
                
                                                    {{-- expire_date--}}
                                                    {{ csrf_field() }}
                                                    <div><button type="submit" onclick="successAlert();" class="btn btn-primary pull-right" id="submit" style="margin-bottom:4%;">Submit</button></div>  
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
                                    <div class="col-md-4" style="background-color: #F5F5F5; padding-right:0;">
                                        <div class="col-md-12" style="background-color: white;">
                                            <div class="col-md-1">&nbsp;</div>
                                                <div class="col-md-10" style="background-color:red;">
                                                    <img src="{{ asset('images/demo.png') }}" class="img-responsive" />
                                                </div>
                                            <div class="col-md-1">&nbsp;</div>
                                        </div>
                    
                                        <div class="col-md-12" style="background-color: blue;">
                                            <div class="col-md-1">&nbsp;</div>
                                            <div class="col-md-10" style="background-color:green;">
                                                <input type="button" class="btn btn-primary btn-block btn-flat" value="HELLOWRLD"/>
                                            </div>
                                            <div class="col-md-1">&nbsp;</div>
                                        </div>
                                    </div> {{-- End Embedded Device Section--}}
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
                    <div class="tab-pane" id="visitor_register">
                        <div class="col-md-12">
                            <div class="col-md-7" style="background-color:white">
                                    <h3 style="float:left"><strong>VISITOR INFORMATION</strong></h3>
                                    <hr class="hrbreakline">
                                        @if(count($errors)>0)
                                            <ul style="padding-left:0px;">
                                                @foreach($errors->all() as $error)
                                                    <li class="alert alert-danger" style="margin-left:0px;">Error message: <strong><u>{{$error}}</u></strong></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <form class="form-horizontal" method="GET"  name="visitor_regis_form">
                                            <div class="col-md-7">
                                                {{-- Input form section--}}
                                                {{-- cardUID --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="" class="control-label col-md-4" style="text-align:left;">NationalId or PassportId :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="vis_cardId" name="vis_cardId" placeholder="NationalID or PassportId">

                                                            <div id="cardUID_error" class="val_error"></div>
                                                        </div>
                                                </div>

                                                {{-- position --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="position" class="control-label col-md-4" style="text-align:left;">User Type :</label>
                                                        <div class="col-md-8">
                                                        <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                            <select id="regis_position" class="form-control" name="regis_position">
                                                                <option selected value="3">Visitor</option>
                                                                {{--  <option value="2">{{ trans('register.position_staff') }}</option>  --}}
                                                            </select>
                                                        </div>
                                                </div>

                                                {{-- Card Type--}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="cardtype" class="control-label col-md-4" style="text-align:left;">CARD TYPE: </label>
                                                        <div class="col-md-8">
                                                            <select id="regis_cardtype" class="form-control" name="regis_cardtype">
                                                                {{-- Option tags was in JS --}}
                                                            </select>
                                                        </div>
                                                </div>

                                                {{-- title --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="title" class="control-label col-md-4" style="text-align:left;">{{ trans('register.title')}} :</label>
                                                        <div class="col-md-8">
                                                        <!-- <input type="text" class="form-control" id="regis_title" name="regis_title" placeholder="{{ trans('register.title') }}"> -->
                                                            <select id="regis_titleId" class="form-control" name="regis_titleId">
                                                                <option selected value="1">{{ trans('register.title_mr') }}</option>
                                                                <option value="2">{{ trans('register.title_mrs') }}</option>
                                                                <option value="3">{{ trans('register.title_ms') }}</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                {{-- firstname --}}
                                                <div class="form-group row" style="position:relative;">
                                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }} :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="regis_name" name="regis_name" placeholder="{{ trans('register.firstname') }}">
                                                            <div id="name_error" class="val_error"></div>
                                                        </div>
                                                </div>
                                                {{-- lastname --}}
                                                <div class="form-group row">
                                                        <label for="lastname" class="control-label col-md-4" style="text-align:left;">{{ trans('register.lastname') }} :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" id="regis_lastname" name="regis_lastname" placeholder="{{ trans('register.lastname') }}">
                                                            <div id="lastname_error" class="val_error"></div>
                                                        </div>
                                                </div>
            
                                                {{-- expire_date--}}
                                                {{ csrf_field() }}
                                                <div><button type="submit" onclick="successAlert();" class="btn btn-primary pull-right" id="submit" style="margin-bottom:4%;">Submit</button></div>  
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
                                            <tr>
                                                <th nowrap style="background-color:#2e7ed0;color:white;">NO.</th>
                                                <th nowrap style="background-color:#2e7ed0;color:white;">VISITOR CARD NAME</th>
                                                <th nowrap style="background-color:#2e7ed0;color:white;">VISITOR NAME</th>
                                                <th nowrap style="background-color:#2e7ed0;color:white;">ACTION</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                                <?php $null_status_record = 0; 
                                                      $iterator = 1; ?>
                                                @foreach($cardRecord as $record)
                                                    @if (empty($record['cardStatus']))
                                                        <?php $null_status_record++; ?>
                                                    @else
                                                        <tr>
                                                            <td><?php echo $iterator; ?></td>
                                                            <td>{{$record['cardName']}}</td>
                                                            <td>{{$record['cardStatus']}}</td>
                                                            <td><a data-role="card_return" data-id="{{$record['cardId']}}">Return the card</a></td>
                                                            <?php $iterator++; ?>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            
                                        </tbody>

                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            {{-- Card Type --}}
                            <script>
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
                            </script>
                            {{-- End Card Type --}}

                        </div>
                    </div>
                    {{-- End Visitor Section --}}
                </div> {{-- End Tab Content --}}
            </div> {{-- End Tab Pills --}}

        </div>
    </div> {{-- End Container --}}
    
    
    <?php
        function DegreeList(){
            $init_check = true;
            $degreeArry = memberController::degreeList();
            //echo($st["data"][0]["degreeId"]); //single print
            foreach ($degreeArry["data"] as $key => $value){
                if($init_check == true){
                    echo "<option selected value=".$value["degreeId"].">".$value["degreeName"]."</option>";
                    $init_check = false;
                }else{
                    echo "<option value=".$value["degreeId"].">".$value["degreeName"]."</option>";
                }
            }
        }
        function FacultyList(){
            $init_check = true;
            $facArry = memberController::facultyList();
            foreach ($facArry["data"] as $key => $value){
                if($init_check == true){
                    echo "<option selected value=".$value["facultyId"].">".$value["facultyId"]."-".$value["facultyName"]."</option>";
                    $init_check = false;
                }else{
                    echo "<option value=".$value["facultyId"].">".$value["facultyId"]."-".$value["facultyName"]."</option>";
                }
            }
        }
        function MajorList(){
            $init_check = true;
            $majorArray = memberController::majorList();
            foreach ($majorArray["data"] as $key => $value){
                if($init_check == true){
                    echo "<option selected value=".$value["majorId"].">".$value["majorName"]."</option>";
                    $init_check = false;
                }else{
                    echo "<option value=".$value["majorId"].">".$value["majorName"]."</option>";
                }
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

{{-- Return Card Section --}}
<script>
    $(document).ready(function(){
        $(document).on('click', 'a[data-role=card_return]', function(){
            var visitor_cardId = $(this).data('id');
            $.ajax({
                url : $('#api_url').val() + '/cardController/returnCard',
                type : 'put',
                data : {cardId: visitor_cardId},
                success : function(response){
                    alert("Return Complete")
                    location.reload();
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
    });
</script>
{{-- End Datatable Section--}}

@endsection

@section('extra_script')
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>
@endsection