<?php use \App\Http\Controllers\memberController; ?>
@extends('core')

@section('more_script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
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
</style>
</style>
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
            <!-- 1st HEADER -->
            <div class="col-md-12">
                <h2 style="color:#2e7ed0;"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.member') }}</a>  >  {{ trans('register.register') }}</strong></h2>
                <hr class="hrbreakline">
            </div>
            
            <div class="col-md-12">
                <div class="col-md-8" style="background-color:white;">
                    <h3 style="float:left"><strong>{{ trans('register.memberinformation') }}</strong></h3>
                    {{--  <img src={{ asset('images/file_upload.png') }} style="float:right;margin-top:6px;" height="45" width="45"/>  --}}
                    <input type="image" src="{{ asset('images/file_upload.png') }}" style="float:right; width:45px; height:45px; margin-top: 6px;" data-toggle="modal" data-target="#myModal"/>
                    <hr class="hrbreakline">

                        <form class="form-horizontal" action="{{ url('memberController/memberSingleInsert') }}" method="post">
                                <div class="col-md-5">
                                    {{-- Input form section--}}
                                    
                                    {{-- cardUID --}}
                                    <div class="form-group row" style="position:relative;">
                                            <label for="cardUID" class="control-label col-md-4" style="text-align:left;">{{ trans('register.cardUID') }} :</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" id="regis_cardUID" name="regis_cardUID" placeholder="{{ trans('register.cardUID') }}">
                                            </div>
                                    </div>
                                    {{-- memberId--}}
                                    <div class="form-group row" style="position:relative;">
                                            <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.memberId') }} :</label>
                                            <div class="col-md-8">
                                            <input type="text" class="form-control" id="regis_memberId" name="regis_memberId" placeholder="{{ trans('register.memberId') }}">
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
                                            </div>
                                    </div>
                                    {{-- lastname --}}
                                    <div class="form-group row">
                                            <label for="lastname" class="control-label col-md-4" style="text-align:left;">{{ trans('register.lastname') }} :</label>
                                            <div class="col-md-8">
                                            <input type="text" class="form-control" id="regis_lastname" name="regis_lastname" placeholder="{{ trans('register.lastname') }}">
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
                                    {{-- expire_date--}}
                                    {{ csrf_field() }}
                                    <div><button type="submit" class="btn btn-primary" id="submit">Submit</button></div>
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

                <!--<div class="col-md-4" style="background-color: #F5F5F5; padding-right:0;">
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
                </div>-->
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

        </div> <!-- -->
    </div>
    
    
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
    //function SuccessAlert(){    
      //  swal("Oops", "Something went wrong!", "error");
    //}
    var form = document.getElementById("submit");
    document.getElementById("submit").addEventListener("click",function(){
        swal("Oops", "Something went wrong!", "error");
    });
</script>

@endsection

@section('extra_script')
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>
@endsection