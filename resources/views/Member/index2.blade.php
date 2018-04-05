<?php use \App\Http\Controllers\memberController; ?>
<?php use \App\Http\Controllers\visitorController; ?>
<?php use \App\Http\Controllers\customizeController; ?>
@extends('core')

@section('more_script')
  {{-- SweetAlert --}}
  <script src="{{asset('js/sweetalert.min.js')}}"></script>

  {{-- Flat-UI --}}
  <link href="{{asset('css/flat-ui/flat-ui.css')}}"/>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           

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

@section('activemember')
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
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:<?php echo customizeController::themeColor(); ?>" id="memberManagementTitle"><strong>{{ trans('menu.member') }}</strong></a><a id="helper" data-role="helper" style="font-size:15px;"><i class="fa fa-1x fa-question-circle-o" style="color:{{config('pathConfig.title_word_color')}};"></i></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-12">
            <div class="col-md-1">
                &nbsp;
            </div>
                

            {{-- TAB --}}
            <div id="exTab3" class="col-md-10">	
                <ul  class="nav nav-pills">
                    <li class="active">
                        <a  href="#memberManagement_tab" data-toggle="tab"><strong>{{ trans('menu.member') }}</strong></a>
                    </li>
                </ul>

                <div class="tab-content clearfix">
                    {{-- Member Management Tabpills--}}
                        <div class="tab-pane active" id="memberManagement_tab">
                            <div class="col-md-12" style="background-color:white; padding-top:1%;" id="myDivTable">
                                {{-- Add Member & Filtering Section --}}

                                <div class="col-md-12"></h1>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">

                                    <form action="{{ URL::to('/memberController/memberSearchandFilter') }}" method="post" id="search_form" name="search_form" class="search_form">
                                    {!! csrf_field() !!}
                                        <input type="text" value='' class="form-control input-lg" id="searchString" name="searchString" placeholder="Search e.g. PatronId, StdCode, UnivId, FirstName, LastName" style="width: 100%;border-radius:50px;text-align:center;">
                                        {{-- Search PatronClass --}}
                                        <div class="col-md-4" style="margin-top:1%;">
                                            <label for="filter_patronClass">{{ trans('table.patron_class') }} : </label>
                                            <select class="form-control column_filter" id="PtnClassId" name="PtnClassId" >
                                                <option value="null" selected>{{ trans('table.show_all') }}</option>
                                                <?php PatronClassList(); ?>
                                            </select>
                                        </div>

                                        {{-- Search PatronGroup --}}
                                        <div class="col-md-4" style="margin-top:1%;">
                                            <label for="filter_group">{{ trans('table.group') }} : </label>
                                            <select class="form-control column_filter" id="PtnGroup" name="PtnGroup">
                                                <option value="null" selected>{{ trans('table.show_all') }}</option>
                                                <?php GroupList(); ?>
                                            </select>
                                        </div>

                                        {{-- Search Department --}}
                                        <div class="col-md-4" style="margin-top:1%;">
                                            <label for="filter_dept">{{ trans('table.department') }} : </label>
                                            <select class="form-control column_filter" id="DeptId" name="DeptId">
                                                <option value="null" selected>{{ trans('table.show_all') }}</option>
                                                <?php DeptList(); ?>
                                            </select>
                                        </div>

                                        {{-- Search Faculty --}}
                                        <div class="col-md-4" style="margin-top:1%;">
                                            <label for="filter_faculty">{{ trans('table.faculty') }} : </label>
                                            <select class="form-control column_filter" id="FacId" name="FacId">
                                                <option value="null" selected>{{ trans('table.show_all') }}</option>
                                                <?php FacultyList(); ?>
                                            </select>
                                        </div>

                                        {{-- Status --}}
                                        <div class="col-md-4" style="margin-top:1%;">
                                            <label for="filter_status">{{ trans('table.status') }} : </label>
                                            <select class="form-control column_filter" id="Status" name="Status">
                                                <option value="null" selected>{{ trans('table.show_all') }}</option>
                                                <option value="active">ACTIVE</option>
                                                <option value="inactive">INACTIVE</option>
                                                <option value="blacklist">BLACKLIST</option>
                                            </select>
                                        </div>

                                        {{-- Empty div--}}
                                        <!-- <div class="col-md-3"></div> -->

                                        {{-- Submit Form --}}
                                        <div class="col-md-4" style="margin-top:1%;">
                                            <label for="">  </label>
                                            <button type="submit" id="search_button" class="form-control btn btn-success">Submit</button>
                                        </div>
                                    </form>

                                        <table style="margin-top:1.1%;">
                                            @if(strpos($permission, 'add_member') === false && strpos($permission, 'add_visitor') === false)
                                            @else
                                                <!-- <a href="{{ URL::to('/memberregister') }}" style="position: relative;"><input type="image" src="{{ asset('images/plus.png') }}" style="float:right; width:35px; height:35px; margin-top: 1%;"  id="addNewMember"/></a> -->
                                            @endif
                                        </table>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>

                                <div class="col-md-12" style="margin-bottom: 2%;margin-top: 1.5%;">
                                    {{-- Filter Section --}}
                                    {{-- End Filter Section --}}
                                    <!-- <a href="{{ URL::to('/memberregister') }}"><input type="image" src="{{ asset('images/plus.png') }}" style="float:right; width:35px; height:35px; margin-top: 0.5%; margin-bottom: 1%;"  id="addNewMember"/></a> -->
                                    <!-- <div class="col-md-12"><a href=""><button class="btn btn-success pull-right">HELLo</button></a></div>
                                    <div class="col-md-12"><div class="input-group pull-right" style="width:155px; margin-bottom: 1%;"><span class="input-group-addon"><i class="fa fa-x fa-plus"></i></span><button class="form-control">Add Member</button></div></div> -->
                                </div>
                                {{-- End Add Member & Filtering Section --}}
                                
                                    <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                                        <thead id="table_header">
                                            <tr id="filter_global" style="background-color:<?php echo customizeController::themeColor(); ?>; color:{{config('pathConfig.table_header_title_color')}};">
                                                <th nowrap style=""><strong>{{ trans('table.no') }}</strong></th>
                                                <th nowrap style=""><strong>{{trans('register.patronId')}}</strong></th>
                                                <th nowrap style=""><strong>{{trans('register.univId')}}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('register.stdCode') }}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('table.patron_class') }}</strong></th>
                                                <th nowrap style="display:none">PATRONCLASSID</th>
                                                <th nowrap style=""><strong>{{ trans('register.firstname') }}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('register.lastname') }}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('table.faculty') }}</strong></th>
                                                <th nowrap style="display:none;">FACULTYID</th>
                                                <th nowrap style=""><strong>{{ trans('table.department') }}</strong></th>
                                                <th nowrap style="display:none;">DEPARTMENTID</th>
                                                <th nowrap style=""><strong>{{ trans('table.group') }}</strong></th>
                                                <th nowrap style="display:none;">PtnGroupId</th>
                                                <th nowrap style="" style=""><strong>{{ trans('table.expire_date') }}</strong></th>
                                                <th nowrap style=""><strong>{{ trans('table.status') }}</strong></th>
                                                <th nowrap style="display:none">RFID</th>
                                                <th nowrap style=""><strong>ACTION</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyTable" name="bodyTable">
                                            <?php $iterator = 1;?>
                                            @foreach($memberRecord as $record)
                                                    <tr id="{{$record['PtnId']}}" style="font-size: 15px;">
                                                        <td><?php echo $iterator; ?></td>
                                                            <td id="table_PtnId" data-target="PtnId">{{ $record['PtnId'] }}</td> 
                                                            <td data-target="UnivId">{{ $record['UnivId'] }}</td> 
                                                            <td data-target="StdCode">{{ $record['StdCode'] }}</td>
                                                            <td data-target="PatronEn">{{ $record['Patronclass'] }}</td>
                                                            <td data-target="PtnClassId" style="display:none">{{ $record['PtnClassId'] }}</td>
                                                            @if(App::getLocale() == 'en')
                                                                <td data-target="FName">{{ $record['FNameE'] }}</td> 
                                                                <td data-target="LName">{{ $record['LNameE'] }}</td> 
                                                                <td data-target="FacCode" style="display:none;">{{ $record['FacId'] }}</td>
                                                                <td data-target="FacultyEn">{{ $record['Faculty_En_Name'] }}</td> 
                                                                <td data-target="DeptCode" style="display:none;">{{ $record['DeptId'] }}</td> 
                                                                <td data-target="DeptEn">{{ $record['Dept_En_Name'] }}</td> 
                                                            @else
                                                                <td data-target="FName">{{ $record['FName'] }}</td> 
                                                                <td data-target="LName">{{ $record['LName'] }}</td> 
                                                                <td data-target="FacCode" style="display:none;">{{ $record['FacId'] }}</td> 
                                                                <td data-target="FacultyTh">{{ $record['Faculty_Th_Name'] }}</td> 
                                                                <td data-target="DeptCode" style="display:none;">{{ $record['DeptId'] }}</td> 
                                                                <td data-target="DeptTh">{{ $record['Dept_Th_Name'] }}</td> 
                                                            @endif
                                                            <td data-target="PtnGroupId" style="display:none;">{{ $record['PtnGroup'] }}</td> 
                                                            <td data-target="GroupTh">{{ $record['Patrongroup'] }}</td> 
                                                            <td data-target="Exp_Date">{{ $record['Exp_Date'] }}</td> 
                                                            <td data-target="RFId" style="display:none;">{{ $record['RFId'] }}</td> 

                                                            <td data-target="Status" id="column_Status">
                                                                @if($record['Status'] == "ACTIVE")
                                                                    <span class="badge badge-success" style="background-color:#00a65a">
                                                                @elseif($record['Status'] == "INACTIVE")
                                                                    <span class="badge badge-danger" style="background-color:#dd4b39">
                                                                @elseif($record['Status'] == "BLACKLIST")
                                                                    <span class="badge badge-warning">
                                                                @endif
                                                                {{$record['Status']}}</span>
                                                            </td>

                                                            <td style="text-align:center" id="column_action">
                                                            @if(strpos($permission, 'edit_member') !== false)
                                                                <button class="btn btn-success animateButton" data-role="update" data-id="{{$record['PtnId']}}" style="margin-right:5px;" ><i class="fa fa-pencil" style="font-size:14px;"></i></button>
                                                            @else
                                                                <button class="btn btn-success animateButton" data-role="update" data-id="{{$record['PtnId']}}" style="margin-right:5px;" disabled><i class="fa fa-pencil" style="font-size:14px;"></i></button>
                                                            @endif

                                                            @if(strpos($permission, 'del_member') !== false)
                                                                <button class="btn btn-danger animateButton" data-role="delete" data-id="{{$record['PtnId']}}" style="font-size:14px; margin-right:5px;" ><i class="fa fa-trash"></i></button>
                                                            @else
                                                                <button class="btn btn-danger animateButton" data-role="delete" data-id="{{$record['PtnId']}}" style="font-size:14px; margin-right:5px;" disabled><i class="fa fa-trash"></i></button>
                                                            @endif
                                                                
                                                            @if($record['Status'] != "BLACKLIST")
                                                                @if(strpos($permission, 'bl_member') !== false)
                                                                    <button class="btn bg-warning animateButton" data-role="blacklist" data-id="{{$record['PtnId']}}" style="font-size:14px; margin-right:5px; background-color:#777777; color: white;" ><i class="fa fa-ban"></i></button>
                                                                @else
                                                                <button class="btn bg-warning animateButton" data-role="blacklist" data-id="{{$record['PtnId']}}" style="font-size:14px; margin-right:5px; background-color:#777777; color: white;" disabled><i class="fa fa-ban"></i></button>
                                                                @endif
                                                            @endif
                                                            </td>

                                                        <?php $iterator++; ?>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                    
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
                                                                                            {{--  <hr class="hrbreakline" style="margin-top:1%;margin-left:1.5%;width:70%;">  --}}
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
                                                        </div>
                                                <!--***************  END MODAL SECTION *************-->

                                                
                    
                        {{-- END NAVTAB --}}
                        
                        {{-- SELECT ONCHANGE SECTION --}}
                        <script>
                            function classOnSelect () {
                                console.log($("#col_patronClass_filter :selected").text());
                                var ptnClass = $('#col_patronClass_filter :selected').text();
                                if(ptnClass == "Show all" || ptnClass == "แสดงทั้งหมด"){ ptnClass = ""; }
                                $('#myTable').DataTable().column(4).search(
                                    ptnClass
                                ).draw();
                            }

                            function deptOnSelect () {
                                console.log($("#col_dept_filter :selected").text());
                                var deptText = $('#col_dept_filter :selected').text();
                                if(deptText == "Show all" || deptText == "แสดงทั้งหมด"){ deptText = ""; }
                                $('#myTable').DataTable().column(11).search(
                                    //document.getElementById('col10_filter').value
                                    deptText
                                ).draw();

                                //+2
                            }

                            function facultyOnSelect () {
                                console.log($('#col_faculty_filter :selected').text());
                                var facultyText = $('#col_faculty_filter :selected').text();
                                if(facultyText == "Show all" || facultyText == "แสดงทั้งหมด"){ facultyText = ""; }
                                $('#myTable').DataTable().column(9).search(
                                    //document.getElementById('col12_filter').value
                                    facultyText
                                ).draw();
                            }

                            function statusOnSelect () {
                                console.log(document.getElementById('col_status_filter').value);
                                var statusText = "(( )|^)" + document.getElementById('col_status_filter').value + "(( )|$)"
                                $('#myTable').DataTable().column(16).search(
                                    statusText, true, false
                                ).draw();
                            }

                            function groupOnSelect () {
                                var groupText = $('#col_group_filter :selected').text();
                                console.log(groupText);
                                if(groupText == "Show all" || groupText == "แสดงทั้งหมด"){ groupText = ""; }
                                $('#myTable').DataTable().column(13).search(
                                    groupText
                                ).draw();
                            }
                        </script>
                        {{-- END SELECT SECTION --}}
                    
                                {{-- DataTables Script--}}
                                <script>
                                    function filterColumn ( i ) {
                                        $('#myTable').DataTable().column(i).search(
                                            $('#col' + i + '_filter').val()
                                        ).draw();
                                        console.log(document.getElementById('col3_filter').value);
                                    }

                                    $(document).ready(function(){
                                        var table = $('#myTable').DataTable({
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
                                            "searching": false,
                                            "lengthChange": false,
                                            "info": false,
                                            "scrollX" : true
                                        });

                                        $('input.column_filter').on( 'keyup click', function() {
                                            filterColumn($(this).parents('tr').attr('data-column'));
                                        });
                                    });
                                </script>

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

                                {{-- Update Script--}}
                                <script>
                                    $(document).ready(function(){
                                        $(document).on('click', 'button[data-role=update]', function(){
                                            var PtnId = $(this).data('id');
                                            var Status = $('#' + PtnId).children('td[data-target=Status]').text().trim();
                                            var FName = $('#' + PtnId).children('td[data-target=FName]').text();
                                            var LName = $('#' + PtnId).children('td[data-target=LName]').text();
                                            var FacCode = $('#' + PtnId).children('td[data-target=FacCode]').text();
                                            var DeptCode = $('#' + PtnId).children('td[data-target=DeptCode]').text();
                                            var PtnGroupId = $('#' + PtnId).children('td[data-target=PtnGroupId]').text();
                                            var UnivId = $('#' + PtnId).children('td[data-target=UnivId]').text();
                                            var RFId = $('#' + PtnId).children('td[data-target=RFId]').text();
                                            //console.log(UnivId);

                                            if(Status == "BLACKLIST"){
                                                Status = false;
                                                $('#modal_status').prop('checked', Status).change();
                                                $('#modal_status').bootstrapToggle('disable');
                                            }else if(Status == "ACTIVE"){
                                                Status = true;
                                                $('#modal_status').bootstrapToggle('enable');
                                                $('#modal_status').prop('checked', Status).change();
                                            }else if(Status == "INACTIVE"){
                                                Status = false;
                                                $('#modal_status').bootstrapToggle('enable');
                                                $('#modal_status').prop('checked', Status).change();
                                            }

                                            $('#modal_memberId').val(PtnId);
                                            $('#modal_firstName').val(FName);
                                            $('#modal_lastName').val(LName);
                                            $('#modal_dept').val(DeptCode);
                                            $('#modal_faculty').val(FacCode);
                                            $('#modal_group').val(PtnGroupId);
                                            $('#modal_Univ').val(UnivId);
                                            $('#modal_RFId').val(RFId);
                                            $('#myActionModal').modal('toggle');
                                        })

                                        $('#update').click(function(){
                                            //GET statusId
                                            var statusId = 2;
                                            if($('#modal_status').prop('checked') == true){
                                                statusId = 2; //ACTIVE
                                            }else{
                                                statusId = 1; //INACTIVE
                                            }

                                            if(document.getElementById("statusHidden").value == "disabled"){
                                                statusId = 3; //BLACKLIST
                                            }
                                            console.log("Updated StatusId : " + statusId);
                                            $.ajax({
                                                url : $('#api_url').val() + 'memberController/memberUpdate',
                                                type : 'put',
                                                //data : {PtnId: $('#modal_memberId').val(), cardUID: $('#modal_cardUID').val(), 'positionId': $('#modal_position').val(), 'titleId': $('#modal_title').val(), 'firstName': $('#modal_firstName').val(), 'lastName': $('#modal_lastName').val(), 'degreeId': $('#modal_degree').val(), 'facultyId': $('#modal_faculty').val(), 'majorId': $('#modal_major').val(), 'Status': "INACTIVE"},
                                                data : {PtnId: $('#modal_memberId').val(), Status: statusId},
                                                success : function(response){
                                                    // $('#' + $('#modal_memberId').val()).children('td[data-target=cardUID]').text($('#modal_cardUID').val());
                                                    modalAlert("update",$('#modal_memberId').val());
                                                    $('#myActionModal').modal('toggle');
                                                    location.reload();
                                                }
                                            });
                                        });
                                    });
                                </script>

                                {{-- Delete Script--}}
                                <script>
                                    $(document).ready(function(){
                                        $(document).on('click', 'button[data-role=delete]', function(){
                                            var PtnId = $(this).data('id');
                                            modalAlert("delete", PtnId);
                                        });
                                    });
                                </script>

                                {{-- BlackList Script --}}
                                <script>
                                    $(document).ready(function(){
                                        $(document).on('click', 'button[data-role=blacklist]', function(){
                                            var PtnId = $(this).data('id');
                                            var FName = $('#' + PtnId).children('td[data-target=FName]').text();
                                            var LName = $('#' + PtnId).children('td[data-target=LName]').text();

                                            $('#blacklist_memberId').val(PtnId);
                                            $('#blacklist_firstName').val(FName);
                                            $('#blacklist_lastName').val(LName);
                                            $('#blackListModal').modal('toggle');

                                            $('#banned').click(function(){
                                                    swal({
                                                        title: "{{trans('table.banned_confirmation')}}",
                                                        text: "Do you sure you want to listed this memberId: " + PtnId,
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    }).then((willDelete)=>{
                                                        if(willDelete){
                                                            $.ajax({
                                                                url : $('#api_url').val() + 'blackListController/addBlackList',
                                                                type : 'post',
                                                                data : {memberId: $('#blacklist_memberId').val(), note: $('#blacklist_description').val(), title: $('#blacklist_title').val(), end_of_banned: $('#restricted_day').val()},
                                                                success : function(response){
                                                                    alert("BANNED COMPLETE");
                                                                    $('#blackListModal').modal('toggle');
                                                                    location.reload();
                                                                }
                                                            });  
                                                        }
                                                    });
                                            });
                                        });
                                    });
                                </script>

                                {{-- Bootstrap Tour --}}
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
                        </div>
                    {{-- End Member Management Tabpills --}}
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
?>

