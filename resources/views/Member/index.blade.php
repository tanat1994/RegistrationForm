<?php use \App\Http\Controllers\memberController; ?>
@extends('core')

@section('more_script')
  {{-- SweetAlert --}}
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    </style>


@endsection

@section('htmlheader_title')
{{ trans('menu.member') }}
@endsection

@section('activemember')
tabbuttonactive
@endsection

@section('content')
    <div class="row-fluid">

        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:#2e7ed0;" id="memberManagementTitle"><strong>{{ trans('menu.member') }}</strong></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-12">
            <div class="col-md-1">
            &nbsp;
            </div>
            
        <div class="col-md-10" style="background-color:white; padding-top:1%;" id="myDivTable">
            <div class="col-md-12"><a href="{{ URL::to('/memberregister') }}"><input type="image" src="{{ asset('images/plus.png') }}" style="float:right; width:35px; height:35px; margin-top: 0.5%; margin-bottom: 1%;"  id="addNewMember"/></a></div>
            <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                <thead id="table_header">
                    <tr>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.no') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.memberId') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.cardUID') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.position') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>PositionId</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>{{ trans('table.title') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>TitleId</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.name') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>FirstName</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>LastName</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.degree') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>DegreeId</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.faculty') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>FacultyId</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.major') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;display:none;"><strong>MajorId</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>STATUS</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.action') }}</strong></th>
                    </tr>
                </thead>
                    <tbody>
                        <?php $iterator = 1;?>
                        @foreach($memberRecord as $record)
                            <tr id="{{$record['memberId']}}" style="font-size: 15px;">
                                <td><?php echo $iterator;?></td>
                                    <td data-target="memberId">{{ $record['memberId'] }}</td>
                                    <td data-target="cardUID">{{ $record['cardUID'] }}</td>
                                    <td data-target="positionName">{{ $record['positionName'] }}</td>
                                    <td data-target="positionId" style="display:none;">{{ $record['positionId'] }}</td>
                                    <td data-target="titleName" style="display:none;">{{ $record['titleName'] }}</td>
                                    <td data-target="titleId" style="display:none;">{{ $record['titleId'] }}</td>
                                    <td data-target="name">{{ $record['firstname'] }}   {{ $record['lastname'] }}</td>
                                    <td data-target="firstname" style="display:none;">{{ $record['firstname'] }}</td>
                                    <td data-target="lastname" style="display:none;">{{ $record['lastname'] }}</td>
                                    <td data-target="degreeName">{{ $record['degreeName'] }}</td>
                                    <td data-target="degreeId" style="display:none;">{{ $record['degreeId'] }}</td>
                                    <td data-target="facultyName">{{ $record['facultyName'] }}</td>
                                    <td data-target="facultyId" style="display:none;">{{ $record['facultyId'] }}</td>
                                    <td data-target="majorName">{{ $record['majorName'] }}</td>
                                    <td data-target="majorId" style="display:none;">{{ $record['majorId'] }}</td>
                                    <td data-target="status" id="column_status">
                                    @if($record['statusId'] == 1)
                                        <span class="badge badge-success" style="background-color:#00a65a">
                                    @elseif($record['statusId'] == 0)
                                        <span class="badge badge-danger" style="background-color:#dd4b39">
                                    @elseif($record['statusId'] == 2)
                                        <span class="badge badge-warning">
                                    @endif
                                    {{$record['statusName']}}</span>
                                    </td>
                                        
                                    <td style="text-align:center" id="column_action">
                                        {{--  <a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>  --}}
                                        <span class="outer-line"><a href="#" data-role="update" data-id="{{$record['memberId']}}" style="font-size:25px; margin-right:8px;"><i class="fa fa-pencil"></i></a></span>
                                        <span class="outer-line" style=""><a href="#" data-role="delete" data-id="{{$record['memberId']}}" style="font-size:25px; padding-bottom: 10px; margin-right:8px;"><i class="fa fa-trash" style="color:#db3236;" aria-hidden="true"></i></a></span>
                                        <span class="outer-line"><a href="#" data-role="blacklist" data-id="{{$record['memberId']}}" style="font-size:25px; margin-right: 8px;"><i class="fa fa-ban" style="color:#404040"></i></a></span>
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
                    <!-- Modal Import-->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title" style="color:#2e7ed0;"><strong>CREATE METHOD</strong></h2>
                                </div>

                                    <div class="modal-body">
                                        <form class="form-horizontal">
                                            <div class="form-group" style="margin-left: 1%;">
                                                <div class="input-group">
                                                    <h4><strong>1. {{trans('register.importfile')}}</strong></h4>

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
                                                                    <p style="margin-top:5px;">** <a href="#">{{trans('register.clickhere')}}</a> {{trans('register.downloadimportformat')}}</p>
                                                                </div>
                                                            </div>
                                                        </div>{{-- END FILE SECTION --}}
                                                        <hr class="hrbreakline" style="margin-top:-1%;margin-left:1.5%;width:70%;">
                                                    <h4><strong>2. {{trans('register.creategroup')}}</strong></h4>
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


                    {{-- Update Modal--}}
                    <div class="modal fade" id="myActionModal" role="dialog">
                            <div class="modal-dialog modal-md"> 
                                <!-- Modal content-->
                                <div class="modal-content">
    
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h2 class="modal-title" style="color:#2e7ed0;"><strong>{{trans("table.edit_data")}}</strong></h2>
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
                                                                            </fieldset>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                    <label for="cardUID" class="control-label col-md-5" style="text-align:left;">{{trans("table.cardUID")}}:</label>
                                                                                    <div class="col-md-7">
                                                                                        <input type="text" class="form-control" id="modal_cardUID" name="modal_cardUID">
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                    <label for="position" class="control-label col-md-5" style="text-align:left;">{{trans("table.position")}}:</label>
                                                                                    <div class="col-md-7">
                                                                                                <select id="modal_position" class="form-control" name="modal_position">
                                                                                                    <option value="1">{{ trans('register.position_student') }}</option>
                                                                                                    <option value="2">{{ trans('register.position_staff') }}</option>
                                                                                                </select>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                    <label for="title" class="control-label col-md-5" style="text-align:left;">{{trans("table.title")}}:</label>
                                                                                    <div class="col-md-7">
                                                                                                <select id="modal_title" class="form-control" name="modal_title">
                                                                                                    <option selected value="1">{{ trans('register.title_mr') }}</option>
                                                                                                    <option value="2">{{ trans('register.title_mrs') }}</option>
                                                                                                    <option value="3">{{ trans('register.title_ms') }}</option>
                                                                                                </select>
                                                                                    </div>
                                                                            </div>

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
                                                                                        <label for="major" class="control-label col-md-5" style="text-align:left;">{{trans("register.major")}}:</label>
                                                                                        <div class="col-md-7">
                                                                                                    <select id="modal_major" class="form-control" name="modal_major">
                                                                                                        <?php majorList(); ?>
                                                                                                    </select>
                                                                                        </div>
                                                                                </div>

                                                                                <div class="form-group row" style="position:relative;">
                                                                                        <label for="degree" class="control-label col-md-5" style="text-align:left;">{{trans("register.degree")}}:</label>
                                                                                        <div class="col-md-7">
                                                                                                    <select id="modal_degree" class="form-control" name="modal_degree">
                                                                                                        <?php degreeList(); ?>
                                                                                                    </select>
                                                                                        </div>
                                                                                </div>
                                                                            </fieldset>

                                                                            <div class="form-group row" style="position:relative;">
                                                                                    <label for="status" class="control-label col-md-5" style="text-align:left;">STATUS:</label>
                                                                                    <div class="col-md-7">
                                                                                            <input type="checkbox" checked data-toggle="toggle" data-on="<strong>ACTIVE</strong>" data-off="<strong>INACTIVE</strong>"data-onstyle="success" data-offstyle="danger" style="width:100%">
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
                                        <h2 class="modal-title" style="color:#2e7ed0;"><strong>{{trans("table.blacklist")}}</strong></h2>
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
                                                                                    <label for="blacklist_title" class="control-label col-md-6" style="text-align:left;">BLACKLIST TITLE:</label>
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

                                                                    </div>
                                                                </div>
                                                            </div>
                                                                    
                                                            {{--  <hr class="hrbreakline" style="margin-top:1%;margin-left:1.5%;width:70%;">  --}}
                                                    </div>
                                                </div>         
                                            </form>
                                        </div> 
        
                                    <div class="modal-footer">
                                        <a href="#" id="banned" class="btn btn-success pull-right">{{trans("table.listed_on_blacklist")}}</a>
                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                    </div>

                                </div>
                            
                            </div>
                        </div>
                <!--***************  END MODAL SECTION *************-->
                

                    {{-- DataTables Script--}}
                    <script>
                        $(document).ready(function(){
                            $('#myTable').dataTable({
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

                    {{-- SweetAlert Function --}}
                    <script>
                            function modalAlert(command, memberId){
                                if(command == "update"){
                                    swal("{{trans('table.memberId')}}: " + memberId, "{{trans('table.update')}}  {{trans('table.complete')}}", "success");
                                    //alert(memberId);
                                }

                                if(command == "delete"){
                                    //swal("{{trans('table.memberId')}}: " + memberId, "{{trans('table.delete_user')}} {{trans('table.has_been_delete')}}", "success");
                                    swal({
                                        title: "{{trans('table.delete_confirmation')}}",
                                        text: "{{trans('table.delete_dialog')}} : " + memberId,
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    }).then((willDelete)=>{
                                        if(willDelete){
                                            $.ajax({
                                                url : 'http://127.0.0.1/Website-NAT/public/index.php/memberController/deleteMember',
                                                //url:  config('pathConfig.pathREST') +'checkLogin/check'
                                                type : 'delete',
                                                data : {memberId: memberId},
                                                success : function(response){
                                                    swal("{{trans('table.memberId')}} : " + memberId + " {{trans('table.delete_has_been_delete')}}", {
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
                            $(document).on('click', 'a[data-role=update]', function(){
                                var memberId = $(this).data('id');
                                var cardUID = $('#' + memberId).children('td[data-target=cardUID]').text();
                                var positionId = $('#' + memberId).children('td[data-target=positionId]').text();
                                var titleId = $('#' + memberId).children('td[data-target=titleId]').text();
                                var firstName = $('#' + memberId).children('td[data-target=firstname]').text();
                                var lastName = $('#' + memberId).children('td[data-target=lastname]').text();
                                var degreeId = $('#' + memberId).children('td[data-target=degreeId]').text();
                                var facultyId = $('#' + memberId).children('td[data-target=facultyId]').text();
                                var majorId = $('#' + memberId).children('td[data-target=majorId]').text();

                                $('#modal_memberId').val(memberId);
                                $('#modal_cardUID').val(cardUID);
                                $('#modal_position').val(positionId);
                                $('#modal_title').val(titleId);
                                $('#modal_firstName').val(firstName);
                                $('#modal_lastName').val(lastName);
                                $('#modal_degree').val(degreeId);
                                $('#modal_faculty').val(facultyId);
                                $('#modal_major').val(majorId);
                                $('#myActionModal').modal('toggle');
                            })

                            $('#update').click(function(){
                                $.ajax({
                                    url : 'http://127.0.0.1/Website-NAT/public/index.php/memberController/memberUpdate',
                                    type : 'put',
                                    data : {memberId: $('#modal_memberId').val(), cardUID: $('#modal_cardUID').val(), 'positionId': $('#modal_position').val(), 'titleId': $('#modal_title').val(), 'firstName': $('#modal_firstName').val(), 'lastName': $('#modal_lastName').val(), 'degreeId': $('#modal_degree').val(), 'facultyId': $('#modal_faculty').val(), 'majorId': $('#modal_major').val() },
                                    success : function(response){
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=cardUID]').text($('#modal_cardUID').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=positionId]').text($('#modal_position').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=titleId]').text($('#modal_title').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=firstname]').text($('#modal_firstName').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=lastname]').text($('#modal_lastName').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=degreeId]').text($('#modal_degree').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=facultyId]').text($('#modal_faculty').val());
                                        $('#' + $('#modal_memberId').val()).children('td[data-target=majorId]').text($('#modal_major').val());
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
                            $(document).on('click', 'a[data-role=delete]', function(){
                                var memberId = $(this).data('id');
                                modalAlert("delete", memberId);
                            });
                        });
                    </script>

                    {{-- BlackList Script --}}
                    <script>
                        $(document).ready(function(){
                            $(document).on('click', 'a[data-role=blacklist]', function(){
                                var memberId = $(this).data('id');
                                var firstName = $('#' + memberId).children('td[data-target=firstname]').text();
                                var lastName = $('#' + memberId).children('td[data-target=lastname]').text();

                                $('#blacklist_memberId').val(memberId);
                                $('#blacklist_firstName').val(firstName);
                                $('#blacklist_lastName').val(lastName);
                                $('#blackListModal').modal('toggle');

                                $('#banned').click(function(){
                                        swal({
                                            title: "{{trans('table.banned_confirmation')}}",
                                            text: "Do you sure you want to listed this memberId: " + memberId,
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        }).then((willDelete)=>{
                                            if(willDelete){
                                                $.ajax({
                                                    url : $('#api_url').val() + 'blackListController/addBlackList',
                                                    type : 'post',
                                                    data : {memberId: $('#blacklist_memberId').val(), note: $('#blacklist_description').val(), title: $('#blacklist_title').val()},
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
                            tour.start(true);
                            if(tour.ended()) tour.restart(true);
                        });
                    </script>


        </div>
            <div class="col-md-1">
            &nbsp;
            </div>
        </div>

    </div>


@endsection

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

