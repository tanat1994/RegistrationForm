<?php use \App\Http\Controllers\memberController; ?>
<?php use \App\Http\Controllers\visitorController; ?>
<?php use \App\Http\Controllers\customizeController; ?>
@extends('core')

@section('more_script')
  {{-- SweetAlert --}}
  <script src="{{asset('js/sweetalert.min.js')}}"></script>

  {{-- Flat-UI --}}
  <link href="{{asset('css/flat-ui/flat-ui.css')}}"/>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           

  {{-- Button Select --}}

  {{--DATATABLES--}}
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
  
  <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>

  {{-- Toggle button --}}
  <link type="text/css" href="{{asset('css/bootstrap-toggle/bootstrap-toggle.min.css')}}" rel="stylesheet">
  <script src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

  <script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>

  {{-- Bootstrap Tour --}}
  <link type="text/css" href="{{asset('css/bootstrap-tour/bootstrap-tour.min.css')}}" rel="stylesheet">
  <script src="{{asset('js/bootstrap-tour/bootstrap-tour.min.js')}}"></script>

  {{-- Loading Screen --}}
  <link type="text/css" rel="stylesheet" href="{{asset('css/loadingstyle.css')}}"/>

    <link type="text/css" rel="stylesheet" href="{{asset('css/parsley/parsley.css')}}"></script>
    <script src="{{asset('js/parsley/parsley.min.js')}}"></script>

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

            .fa { position: absolut;
            top: 0;
            left: 0; }

            {{-- Border TabPills --}}
            .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
                //border-top-color: red;
            }

            {{-- Body TabPills --}}
            .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
                //background-color: red;
                //color: green;
            }

            {{-- Button Animated --}}
            .animateButton {
                box-shadow: 0 1.5px #999;
            }
            .animateButton:active {
                box-shadow: 0 1px #666;
                transform: translateY(3px);
            }

            .nav-pills > li.active > a,
            .nav-pills > li.active > a:hover,
            .nav-pills > li.active > a:focus {
            border-top-color: <?php echo customizeController::themeColor(); ?>;
            }

            .nav-pills > li.active > a,
            .nav-pills > li.active > a:hover,
            .nav-pills > li.active > a:focus {
            color: #ffffff;
            background-color: <?php echo customizeController::themeColor(); ?>;
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

            .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus{
            background-color: <?php echo customizeController::themeColor(); ?>;
            border-color: <?php echo customizeController::themeColor(); ?>;
            }

    </style>


@endsection

@section('htmlheader_title')
{{ trans('menu.member') }}
@endsection

@section('active_visitor')
tabbuttonactive
@endsection

@section('body_function')
    onload="loadingFunction();"
@endsection

@section('content')
    <?php 
        $permission = Session::get('menuPermission')["rc"]["mm"];
    ?>
    {{-- Loading Screen Section--}}
    <ul class="loadingStyle" id="myLoadingScreen">
        <li>L</li>
        <li>O</li>
        <li>A</li>
        <li>D</li>
        <li>I</li>
        <li>N</li>
        <li>G</li>
        <li>.</li>
        <li>.</li>
        <li>.</li>
    </ul>

    @if(App::getLocale() == 'en')
            
    @else 
            
    @endif

    <div class="row-fluid" id="myDisplaySection" style="display:none;"> <!-- <div class="row-fluid">-->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:<?php echo customizeController::themeColor(); ?>" id="memberManagementTitle"><strong>{{trans('menu.visitormanagement')}}</strong></a><a id="helper" data-role="helper" style="font-size:15px;"><i class="fa fa-1x fa-question-circle-o" style="color:{{config('pathConfig.title_word_color')}};"></i></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-12">
            <div class="col-md-1">
                &nbsp;
            </div>

            {{-- TAB --}}
            <div class="col-md-10">
                <ul  class="nav nav-pills">
                    <li class="active">
                        <a  href="_tab" data-toggle="tab"><strong>{{trans('menu.visitormanagement')}}</strong></a>
                    </li>
                </ul>
                <div class="tab-content clearfix">
                    {{-- Member Management Tabpills--}}
                                {{-- Add Member & Filtering Section --}}
                                <div class="col-md-12"></h1>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>

                                {{-- End Add Member & Filtering Section --}}
                                    
                                    <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>
                                        <!--*************** MODAL SECTION *************-->
                                
                                                    {{-- Update Modal--}}
                                                        <div class="modal fade" id="myActionModal" role="dialog">
                                                            <div class="modal-dialog modal-md"> 
                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                    
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h2 class="modal-title" style="color:<?php echo customizeController::themeColor(); ?>;"><strong>{{trans("table.edit_data")}}</strong></h2>
                                                                    </div>
                                    
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal">
                                                                                <div class="form-group" style="margin-left: 1%;">
                                                                                    <div class="input-group">
                                                                                            <div class="container">
                                                                                                <div class="row-fluid">
                                                                                                    <div class="col-xs-12 col-md-5" style="margin-left:2%;">  
                                                                                                            <fieldset disabled>
                                                                                                                    <div class="form-group row" style="position:relative;">
                                                                                                                            <label for="memberId" class="control-label col-md-5" style="text-align:left;">{{trans("table.memberId")}}:</label>
                                                                                                                            <div class="col-md-7">
                                                                                                                                <input type="text" class="form-control" id="modal_memberId" name="modal_memberId">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            
                                                                                                                    <div class="form-group row" style="position:relative;">
                                                                                                                            <label for="UnivId" class="control-label col-md-5" style="text-align:left;">{{trans('register.univId')}}:</label>
                                                                                                                            <div class="col-md-7">
                                                                                                                                <input type="text" class="form-control" id="modal_Univ" name="modal_Univ">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            
                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="RFId" class="control-label col-md-5" style="text-align:left;">RFID:</label>
                                                                                                                    <div class="col-md-7">
                                                                                                                        <input type="text" class="form-control" id="modal_RFId" name="modal_RFId">
                                                                                                                    </div>
                                                                                                            </div>
                                
                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="patronClass" class="control-label col-md-5" style="text-align:left;">{{ trans('table.patron_class') }}:</label>
                                                                                                                    <div class="col-md-7">
                                                                                                                                <select id="modal_patronClass" class="form-control" name="modal_patronClass">
                                                                                                                                    <?php PatronClassList(); ?>
                                                                                                                                </select>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                        
                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="title" class="control-label col-md-5" style="text-align:left;">{{trans("table.title")}}:</label>
                                                                                                                    <div class="col-md-7">
                                                                                                                                <select id="modal_title" class="form-control" name="modal_title">
                                                                                                                                    <option selected value="Mr.">{{ trans('register.title_mr') }}</option>
                                                                                                                                    <option value="Mrs.">{{ trans('register.title_mrs') }}</option>
                                                                                                                                    <option value="Ms.">{{ trans('register.title_ms') }}</option>
                                                                                                                                </select>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                        </fieldset>
                                                                                                            <fieldset disabled>
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="firstName" class="control-label col-md-5" style="text-align:left;">{{trans("register.firstname")}}:</label>
                                                                                                                        <div class="col-md-7">
                                                                                                                            <input type="text" class="form-control" id="modal_firstName" name="modal_firstName">
                                                                                                                        </div>
                                                                                                                </div>
                                
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="lastName" class="control-label col-md-5" style="text-align:left;">{{trans("register.lastname")}}:</label>
                                                                                                                        <div class="col-md-7">
                                                                                                                            <input type="text" class="form-control" id="modal_lastName" name="modal_lastName">
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                            
                                
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="faculty" class="control-label col-md-5" style="text-align:left;">{{trans("register.faculty")}}:</label>
                                                                                                                        <div class="col-md-7">
                                                                                                                                    <select id="modal_faculty" class="form-control" name="modal_faculty">
                                                                                                                                        <?php facultyList(); ?>
                                                                                                                                    </select>
                                                                                                                        </div>
                                                                                                                </div>
                                
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="group" class="control-label col-md-5" style="text-align:left;">{{trans("table.group")}}:</label>
                                                                                                                        <div class="col-md-7">
                                                                                                                                    <select id="modal_group" class="form-control" name="modal_group">
                                                                                                                                        <?php groupList(); ?>
                                                                                                                                    </select>
                                                                                                                        </div>
                                                                                                                </div>
                                
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="dept" class="control-label col-md-5" style="text-align:left;">{{trans("table.department")}}:</label>
                                                                                                                        <div class="col-md-7">
                                                                                                                                    <select id="modal_dept" class="form-control" name="modal_dept">
                                                                                                                                        <?php DeptList(); ?>
                                                                                                                                    </select>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                            </fieldset>
                                
                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="status" class="control-label col-md-5" style="text-align:left;">{{trans("table.status")}}:</label>
                                                                                                                    <div class="col-md-7">
                                                                                                                            <input type="checkbox" data-toggle="toggle" value="ACTIVE" id="modal_status" name="modal_status" class="form-control" data-on="<strong>ACTIVE</strong>" data-off="<strong>INACTIVE</strong>" data-onstyle="success" data-offstyle="danger" data-width="100">
                                                                                                                            <input type="hidden" id="statusHidden" value="enabled"/>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>  
                                                                                    </div>
                                                                                </div>         
                                                                            </form>
                                                                        </div> 
                                        
                                                                    <div class="modal-footer">
                                                                        <a href="#" id="update" class="btn btn-success pull-right">{{trans('table.update')}}</a>
                                                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                                                    </div>
                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                    {{-- BlackList Modal--}}
                                                        <div class="modal fade" id="blackListModal" role="dialog">
                                                                <div class="modal-dialog modal-md">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                    
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h2 class="modal-title" style="color:#2e7ed0;"><strong>{{trans("menu.blacklist")}}</strong></h2>
                                                                        </div>
                                    
                                                                        <div class="modal-body">
                                                                            <form class="form-horizontal" data-parsley-validate>
                                                                                <div class="form-group" style="margin-left: 1%;">
                                                                                    <div class="input-group">
                                                                                            <div class="container">
                                                                                                <div class="row-fluid">
                                                                                                    <div class="col-xs-12 col-md-5" style="margin-left:2%;">  
                                                                                                            <fieldset disabled>
                                                                                                                    <div class="form-group row" style="position:relative;">
                                                                                                                            <label for="memberId" class="control-label col-md-6" style="text-align:left;">{{trans("table.memberId")}}:</label>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <input type="text" class="form-control" id="blacklist_memberId" name="blacklist_memberId">
                                                                                                                            </div>
                                                                                                                    </div>
                                                                                                            </fieldset>
                                
                                                                                                            <fieldset disabled>
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="firstName" class="control-label col-md-6" style="text-align:left;">{{trans("register.firstname")}}:</label>
                                                                                                                        <div class="col-md-6">
                                                                                                                            <input type="text" class="form-control" id="blacklist_firstName" name="blacklist_firstName">
                                                                                                                        </div>
                                                                                                                </div>
                                
                                                                                                                <div class="form-group row" style="position:relative;">
                                                                                                                        <label for="lastName" class="control-label col-md-6" style="text-align:left;">{{trans("register.lastname")}}:</label>
                                                                                                                        <div class="col-md-6">
                                                                                                                            <input type="text" class="form-control" id="blacklist_lastName" name="blacklist_lastName">
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                            </fieldset>
                                
                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="blacklist_title" class="control-label col-md-6" style="text-align:left;">{{trans('table.blacklist_title')}}:</label>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <input type="text" class="form-control" id="blacklist_title" name="blacklist_title">
                                                                                                                    </div>
                                                                                                            </div>
                                
                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="blacklist_description" class="control-label col-md-8" style="text-align:left;">{{trans("table.note")}}({{trans("table.limit_500_char")}}):</label>
                                                                                                                    <div class="col-md-12">
                                                                                                                        <textarea class="form-control" id="blacklist_description" name="blacklist_description" style="width:100%; height: 200px; resize: none;"></textarea>
                                                                                                                    </div>
                                                                                                            </div>

                                                                                                            <div class="form-group row" style="position:relative;">
                                                                                                                    <label for="blacklist_no_of_day" class="control-label col-md-6" style="text-align:left;">{{trans('table.restricted_for')}} :</label>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <div class="input-group">
                                                                                                                            <input type="text" class="form-control" id="restricted_day" name="restricted_day" placeholder="" data-parsley-trigger="change" required=""/>
                                                                                                                            <span class="input-group-btn">
                                                                                                                                <input type="button" class="form-control" id="restricted_day_tag" name="restricted_day_tag" value="{{trans('table.restricted_day')}}" style="background-color:<?php echo customizeController::themeColor(); ?>;color:white;border-color:<?php echo customizeController::themeColor(); ?>;">
                                                                                                                            </span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                            </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                    </div>
                                                                                </div>         
                                                                            </form>
                                                                        </div> 
                                            
                                                                        <div class="modal-footer">
                                                                            <button type="submit" id="banned" class="btn btn-success pull-right">{{trans("table.listed_on_blacklist")}}</button>
                                                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                                                        </div>
                                    
                                                                    </div>
                                                                </div>
                                                <!--***************  END MODAL SECTION *************-->

                                                
                    
                        {{-- END NAVTAB --}}

                                {{-- SweetAlert Function --}} {{-- Member --}}
                                <script>
                                        function modalAlert(command, PtnId){
                                            if(command == "update"){
                                                swal("{{trans('table.memberId')}}: " + PtnId, "{{trans('table.update')}}  {{trans('table.complete')}}d", "success");
                                                //alert(memberId);
                                            }

                                            if(command == "delete"){
                                                swal({
                                                    title: "{{trans('table.delete_confirmation')}}",
                                                    text: "{{trans('table.delete_dialog')}} : " + PtnId,
                                                    icon: "warning",
                                                    buttons: true,
                                                    dangerMode: true,
                                                }).then((willDelete)=>{
                                                    if(willDelete){
                                                        $.ajax({
                                                            url : $('#api_url').val() + 'memberController/deleteMember',
                                                            //url:  config('pathConfig.pathREST') +'checkLogin/check'
                                                            type : 'delete',
                                                            data : {PtnId: PtnId},
                                                            success : function(response){
                                                                swal("{{trans('table.memberId')}} : " + PtnId + " {{trans('table.delete_has_been_delete')}}", {
                                                                    icon: "success",
                                                                });
                                                                location.reload();
                                                            }
                                                        });  
                                                    }
                                                });
                                            }
                                        } 
                                </script>

                            
                                <script>
                                    $(document).ready(function(){
                                        $(document).on('click', 'a[data-role=helper]', function(){
                                            var tour = new Tour({
                                                backdrop:true,
                                                backdropContainer: 'body',
                                                steps:[
                                                    {
                                                        element: "#memberManagementTitle",
                                                        title: "<h1>HELLO,</h1>",
                                                        content: "This is Member Management page. You can manage the information of the users by following steps.",
                                                        placement: "right"
                                                    },
                                                    {
                                                        element: "#addNewMember",
                                                        title: "<h1>STEP1:</h1> Add new member",
                                                        content: "You can add the new member by clicking on this green button.<br><br><img src='{{ asset('images/plus.png') }}' style='width:30px;height:30px;margin-left:40%;' align='middle'/>",
                                                        placement: "left"
                                                    },
                                                    {
                                                        element: "#myTable",
                                                        title: "<h1>STEP2:</h1> Member Information",
                                                        content: "This is the table which contains all of members information <u>such as</u> memberId, degree, etc.",
                                                        placement: "top"
                                                    },
                                                    {
                                                        element: "#column_status",
                                                        title: "<h1> STEP3:</h1> Status Column",
                                                        content: "This column show you a current status of the user <u>e.g.</u><br> <span class='badge badge-success' style='background-color:#00a65a'>ACTIVE</span> <span class='badge badge-danger' style='background-color:#dd4b39'>INACTIVE</span> <span class='badge badge-warning'>BLACKLIST</span>",
                                                        placement: "left"
                                                    },
                                                    {
                                                        element: "#column_action",
                                                        title: "<h1> STEP4:</h1> ACTION Column",
                                                        content: "This column contains the tools for edit, delete, and listed on blacklist for each members.<br><br><i class='fa fa-pencil' style='font-size: 25px;color:#3c8dbc'></i> : <strong>Edit</strong> member's informations<br><i class='fa fa-trash' style='color:#db3236;font-size:25px;' aria-hidden='true'></i> : <strong>Delete</strong> the member.<br><i class='fa fa-ban' style='color:#404040;font-size:25px;'></i> : <strong>Listed</strong> the member on Blacklist",
                                                        placement: "left"
                                                    }
                                                ],
                                            });
                                            tour.init();
                                            tour.setCurrentStep(0);
                                            tour.start(true);
                                        });
                                    });
                                </script>

                                {{-- Loading Screen Section--}}
                                <script>
                                    var myVar;
                                    function loadingFunction() {
                                        myVar = setTimeout(showPage, 2000);
                                    }
                                
                                    function showPage() {
                                        //document.getElementById("myLoadingScreen").style.display = "none";
                                        $('#myLoadingScreen').fadeOut(1000);
                                        document.getElementById("myDisplaySection").style.display = "block";
                                        document.body.style.backgroundColor = "#F5F5F5";
                                    }
                                </script>

                                <div class="col-md-1">
                                    &nbsp;
                                </div>
                            </div>

                    {{-- Visitor Management Tabpills --}}
                            <div class="col-md-12" style="background-color:white; padding-top:1%;">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-hover display" id="visitorTable" cellspacing="0" width="100%">
                                        <thead id="table_header">
                                            <tr id="filter_global" style="background-color:<?php echo customizeController::themeColor(); ?>; color:{{config('pathConfig.table_header_title_color')}};">
                                                <th nowrap style=""><strong>{{ trans('register.visitorNo') }}</strong>
                                                <th nowrap style=""><strong>{{ trans('register.visitor_uid') }}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('register.nationalcard') }}</strong></th>
                                                @if(App::getLocale() == 'en')
                                                    <th nowrap style=""><strong>{{ trans('register.firstname') }}</strong></th>
                                                    <th nowrap style=""><strong>{{ trans('register.lastname') }}</strong></th>
                                                    <th nowrap style="display:none;"><strong>{{ trans('register.firstname') }}</strong></th>
                                                    <th nowrap style="display:none;"><strong>{{ trans('register.lastname') }}</strong></th>
                                                @else 
                                                    <th nowrap style=""><strong>{{ trans('register.firstname') }}</strong></th>
                                                    <th nowrap style=""><strong>{{ trans('register.lastname') }}</strong></th>
                                                    <th nowrap style="display:none;"><strong>{{ trans('register.firstname') }}</strong></th>
                                                    <th nowrap style="display:none;"><strong>{{ trans('register.lastname') }}</strong></th>
                                                @endif
                                                <th nowrap style=""><strong>{{ trans('register.registration_counter') }}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('register.lastest_register') }}</strong></th>
                                                <th nowrap style=""><strong>ACTION</strong></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php getAllVisitorLists(); ?>
                                        </tbody>

                                        <tfoot></tfoot>
                                    </table>   
                                </div>
                            </div>
                            {{-- Visitor Edit Modal--}}
                                <div class="modal fade" id="visitor_edit_modal" role="dialog">
                                    <div class="modal-dialog modal-md"> 
                                        <!-- Modal content-->
                                        <div class="modal-content">
            
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title" style="color:#2e7ed0;"><strong>VISITOR INFORMATION</strong></h2>
                                            </div>
            
                                                <div class="modal-body">
                                                    <form class="form-horizontal">
                                                        <div class="form-group" style="margin-left: 1%;">
                                                            <div class="input-group">
                                                                <div class="container">
                                                                    <div class="row-fluid">
                                                                        <div class="col-xs-12 col-md-5" style="margin-left:2%;">  
                                                                        <fieldset disabled>
                                                                            <div class="form-group row" style="position:relative;">
                                                                                <label for="modal_regis_card_id" class="control-label col-md-5" style="text-align:left;">{{ trans('register.nationalcard') }}:</label>
                                                                                <div class="col-md-7">
                                                                                    <input type="text" class="form-control" id="modal_regis_card_id" name="modal_regis_card_id">
                                                                                </div>
                                                                            </div>
                                                                    
                                                                            <div class="form-group row" style="position:relative;">
                                                                                <label for="modal_regis_uid" class="control-label col-md-5" style="text-align:left;">{{ trans('register.visitor_uid') }}:</label>
                                                                                <div class="col-md-7">
                                                                                    <input type="text" class="form-control" id="modal_regis_uid" name="modal_regis_uid">
                                                                                </div>
                                                                            </div>
                                                                        </fieldset>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                <label for="modal_regis_fname_en" class="control-label col-md-5" style="text-align:left;">{{ trans('register.firstname') }} (EN):</label>
                                                                                <div class="col-md-7">
                                                                                    <input type="text" class="form-control" id="modal_regis_fname_en" name="modal_regis_fname_en">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                <label for="modal_regis_lname_en" class="control-label col-md-5" style="text-align:left;">{{ trans('register.lastname') }} (EN):</label>
                                                                                <div class="col-md-7">
                                                                                    <input type="text" class="form-control" id="modal_regis_lname_en" name="modal_regis_lname_en">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                <label for="modal_regis_fname_th" class="control-label col-md-5" style="text-align:left;">{{ trans('register.firstname') }} (TH):</label>
                                                                                <div class="col-md-7">
                                                                                    <input type="text" class="form-control" id="modal_regis_fname_th" name="modal_regis_fname_th">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                <label for="modal_regis_lname_th" class="control-label col-md-5" style="text-align:left;">{{ trans('register.lastname') }} (TH):</label>
                                                                                <div class="col-md-7">
                                                                                    <input type="text" class="form-control" id="modal_regis_lname_th" name="modal_regis_lname_th">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>         
                                                    </form>
                                                </div> 
                
                                            <div class="modal-footer">
                                                <a href="#" id="visitorupdate" data-role="visitorupdate" name="visitorupdate" class="btn btn-success pull-right">{{trans('table.update')}}</a>
                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            {{-- End Visitor Edit Modal --}}

                            {{-- Visitor Update Button Display Modal --}}
                                <script>
                                    $(document).ready(function(){
                                        $(document).on('click', 'button[data-role=visitor_update]', function(){
                                            var regis_card_id = $(this).data('id');
                                            var regis_uid = $('#' + regis_card_id).children('td[data-target=regis_uid]').text();
                                            var regis_fname_en = $('#' + regis_card_id).children('td[data-target=regis_fname_en]').text();
                                            var regis_lname_en = $('#' + regis_card_id).children('td[data-target=regis_lname_en]').text();
                                            var regis_fname_th = $('#' + regis_card_id).children('td[data-target=regis_fname_th]').text();
                                            var regis_lname_th = $('#' + regis_card_id).children('td[data-target=regis_lname_th]').text();
                                            $('#modal_regis_card_id').val(regis_card_id);
                                            $('#modal_regis_uid').val(regis_uid);
                                            $('#modal_regis_fname_en').val(regis_fname_en);
                                            $('#modal_regis_lname_en').val(regis_lname_en)
                                            $('#modal_regis_fname_th').val(regis_fname_th);
                                            $('#modal_regis_lname_th').val(regis_lname_th);
                                            $('#visitor_edit_modal').modal('toggle');
                                        })
                                    });
                                </script>
                            {{-- End of Visitor Update Button Display Modal --}}

                            {{-- Visitor Update Info --}}
                                <script>
                                    var id = $('#modal_regis_card_id').val();
                                    $('#visitorupdate').click(function(){
                                        $.ajax({
                                            url : $('#api_url').val() + 'visitorController/updateVisitorInfo',
                                            type : 'put',
                                            data : {
                                                regis_card_id: $('#modal_regis_card_id').val(),
                                                regis_uid: $('#modal_regis_uid').val(),
                                                regis_fname_en: $('#modal_regis_fname_en').val(),
                                                regis_lname_en: $('#modal_regis_lname_en').val(),
                                                regis_fname_th: $('#modal_regis_fname_th').val(),
                                                regis_lname_th: $('#modal_regis_lname_th').val()
                                            },
                                            success : function(response){
                                                modalAlert("update", id);
                                                location.reload();
                                            }
                                        });
                                    });
                                </script>
                            {{-- End of Visitor Update Info --}}

                            {{-- Visitor Delete Script --}}
                                <script>
                                    $(document).on('click', 'button[data-role=visitor_delete]', function(){
                                        var regis_card_id = $(this).data('id');
                                        swal({
                                            title: "{{trans('table.delete_confirmation')}}",
                                            text: "{{trans('table.delete_dialog')}} : " + regis_card_id,
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        }).then((willDelete)=>{
                                            if(willDelete){
                                                $.ajax({
                                                    url : $('#api_url').val() + 'visitorController/deleteVisitorRecord',
                                                    //url:  config('pathConfig.pathREST') +'checkLogin/check'
                                                    type : 'delete',
                                                    data : {regis_card_id: regis_card_id},
                                                    success : function(response){
                                                        swal("{{trans('table.memberId')}} : " + regis_card_id + " {{trans('table.delete_has_been_delete')}}", {
                                                            icon: "success",
                                                        });
                                                        location.reload();
                                                    }
                                                });  
                                            }
                                        });
                                    });
                                </script>
                            {{-- End of Visitor Delete Script --}}
                        <script>
                            $(document).ready(function(){
                                $('#visitorTable').DataTable({
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
                                        "lengthMenu" : "{{trans('table.show')}} _MENU_ {{trans('table.entries')}}"
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<?php
    function DeptList(){
        $init_check = true;
        $facArry = memberController::deptList();
        $language = checkLocale();
        foreach ($facArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["DeptId"].">".$value[$language]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["DeptId"].">".$value[$language]."</option>";
            }
        }
    }

    function FacultyList(){
        $init_check = true;
        $facArry = memberController::facultyList();
        $language = checkLocale();
        foreach ($facArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["FacId"].">".$value[$language]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["FacId"].">".$value[$language]."</option>";
            }
        }
    }
    function GroupList(){
        $init_check = true;
        $facArry = memberController::groupList();
        $language = checkLocale();
        foreach ($facArry["data"] as $key => $value){
            if($init_check == true){
                echo "<option value=".$value["PtnGroupId"].">".$value["Th_Name"]."</option>";
                $init_check = false;
            }else{
                echo "<option value=".$value["PtnGroupId"].">".$value["Th_Name"]."</option>";
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

    function getAllVisitorLists () {
        $visitorLists = visitorController::getAllVisitorLists();
        $language = checkLocale();
        $iterator = 1;
        foreach ($visitorLists["data"] as $key => $value){
            echo "<tr id='".$value['regis_card_id']."' style='font-size: 15px;'>";
            echo "<td data-target='visitor_no'>".$iterator."</td>";
            echo "<td data-target='regis_uid'>".$value['regis_uid']."</td>";
            echo "<td data-target='regis_card_id'>".$value['regis_card_id']."</td>";
            if($language == 'En_Name'){
                echo "<td data-target='regis_fname_en'>".$value['regis_fname_en']."</td>";
                echo "<td data-target='regis_lname_en'>".$value['regis_lname_en']."</td>";
                echo "<td data-target='regis_fname_th' style='display:none;'>".$value['regis_fname_th']."</td>";
                echo "<td data-target='regis_lname_th' style='display:none;'>".$value['regis_lname_th']."</td>";
            }else{
                echo "<td data-target='regis_fname_th'>".$value['regis_fname_th']."</td>";
                echo "<td data-target='regis_lname_th'>".$value['regis_lname_th']."</td>";
                echo "<td data-target='regis_fname_en' style='display:none;'>".$value['regis_fname_en']."</td>";
                echo "<td data-target='regis_lname_en' style='display:none;'>".$value['regis_lname_en']."</td>";
            }
            //<a href="{{ asset('images/visitor_Images/'.$result['regis_img_camera']) }}" ><img src="{{ asset('images/visitor_Images/'.$result['regis_img_camera']) }}"/></a>
            echo "<td data-target='regis_total'>".$value['regis_total']."</td>";
            echo "<td data-target='regis_create_at'>".$value['regis_create_at']."</td>";
            $permission = Session::get('menuPermission')["rc"]["mm"];
            echo "<td style='text-align:center' id='visitor_column_action'>";
                if(strpos($permission, 'edit_vist') !== false){
                    echo "<button class='btn btn-success animateButton' data-role='visitor_update' data-id='".$value['regis_card_id']."' style='margin-right:5px;' ><i class='fa fa-pencil' style='font-size:14px;'></i></button>";
                }else{
                    echo "<button class='btn btn-success animateButton' data-role='visitor_update' data-id='".$value['regis_card_id']."' style='margin-right:5px;' disabled><i class='fa fa-pencil' style='font-size:14px;'></i></button>";
                }
                if(strpos($permission, 'del_vist') !== false) {
                    echo "<button class='btn btn-danger animateButton' data-role='visitor_delete' data-id='".$value['regis_card_id']."'style='font-size:14px; margin-right:5px;' ><i class='fa fa-trash'></i></button>";
                }else{
                    echo "<button class='btn btn-danger animateButton' data-role='visitor_delete' data-id='".$value['regis_card_id']."'style='font-size:14px; margin-right:5px;' disabled><i class='fa fa-trash'></i></button>";
                }
            echo "</td>";

            echo "</tr>";
            $iterator++;
        }
    }
?>
