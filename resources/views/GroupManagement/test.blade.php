@extends('core')
<?php 
use App\Http\Controllers\groupController;
use \App\Http\Controllers\customizeController; 
?>

@section('more_script')

  {{--DATATABLES--}}
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>

  <script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>

  <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>

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

            .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus{
            background-color: <?php echo customizeController::themeColor(); ?>;
            border-color: <?php echo customizeController::themeColor(); ?>;
            }

            
    </style>

@endsection

@section('htmlheader_title')
{{ trans('menu.group') }}
@endsection

@section('activegroup')
tabbuttonactive
@endsection

@section('content')

    <div class="row-fluid">
        <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:<?php echo customizeController::themeColor(); ?>;"><strong>{{ trans('menu.group') }}</strong></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-1"></div>

        <div id="exTab3" class="col-md-12">	
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li class="member_tab active" style="font-size:1.5em;">
                        <a href="#group_management" data-toggle="tab"><strong>GROUP MANAGEMENT</strong></a>
                    </li>
                    <li class="visitor_tab" style="font-size:1.5em;">
                        <a href="#custom_group_management" data-toggle="tab"><strong>CUSTOM GROUP MANAGEMENT</strong></a>
                    </li>
                </ul>
            </div>

            {{-- Tab Content --}}
            <div class="tab-content clearfix">
                {{-- GROUP MANAGEMENT --}}
                <div class="tab-pane member_section active" id="group_management">
                    <div class="col-md-4" style="background-color:#F5F5F5;">
                        <div class="col-md-12" style="background-color:white;">
                            <h2><strong>{{trans('register.group_registration')}}</strong></h2>
                            <hr class="hrbreakline">
                            <div class="col-md-12"> 
                                <form class="form-horizontal" method="POST" action="{{url('groupController/postVisitorCardInsert')}}">
                                    {!! csrf_field() !!}
                                    {{-- GROUP ID --}}
                                    <div class="form-group row" style="position:relative;">
                                        <div class="col-md-4">
                                            <label for="cardName" class="control-label">{{ trans('table.groupId') }} : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" placeholder="{{ trans('table.groupId') }} " name="regis_groupId" id="regis_groupId"/>
                                        </div>
                                    </div>

                                    {{-- GROUP NAME --}}
                                    <div class="form-group row" style="position:relative;">
                                        <div class="col-md-4">
                                            <label for="cardUID" class="control-label">{{ trans('table.groupname') }} : </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" placeholder="{{ trans('table.groupname') }}" name="regis_groupName" id="regis_groupName"/>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="position:relative;">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success pull-right" value="{{trans('register.submit_register')}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="position:relative;">
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8" style="background-color:#F5F5F5;">
                        <!--<div class="col-md-12" style="background-color:white;">
                            <div class="col-md-12">
                                <input type="image" src="{{ asset('images/plus.png') }}" style="float:right; width:35px; height:35px; margin-top: 1%;" data-toggle="modal" data-target="#myModal"/>
                            </div>
                        </div>-->
                        
                        <div class="col-md-12" style="background-color:white; margin-top: 0px;">
                            <div class="col-md-12">
                                    <!-- <input type="image" src="{{ asset('images/plus.png') }}" style="float:right; width:35px; height:35px; margin-top: 1.5%;" data-toggle="modal" data-target="#myModal"/> -->
                            </div>
                            <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr style="background-color:<?php echo customizeController::themeColor(); ?>";>
                                        <th nowrap style="color:white;"><strong>{{trans('register.visitorNo')}}</strong></th>
                                        <th nowrap style="color:white;"><strong>{{ trans('table.groupId') }}</strong></th>
                                        <th nowrap style="color:white;"><strong>{{ trans('table.groupname') }}</strong></th>
                                        <th nowrap style="color:white;"><strong>ACTION</strong></th>
                                    </tr>
                                </thead>
                                    <tbody id="data-group-fetch">
                                        <?php $null_status_record = 0; $iterator = 1; ?>
                                        @foreach($groupRecord as $record)
                                            <tr id="{{$record['PtnGroupId']}}">
                                                <td><?php echo $iterator++; ?></td>
                                                <td data-target="{{ $record['PtnGroupId'] }}">{{ $record['PtnGroupId'] }}</td>
                                                <td data-target="groupName">{{ $record['Th_Name'] }}</td>
                                                <td style="text-align:center;">
                                                    <button class="btn btn-success animateButton" data-role="update" data-id="{{$record['PtnGroupId']}}" style="margin-right:5px;" ><i class="fa fa-pencil" style="font-size:14px;"></i></button>
                                                    <button class="btn btn-danger animateButton" data-role="delete" data-id="{{$record['PtnGroupId']}}" style="font-size:14px; margin-right:5px;" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>

                                    <tfoot>
                                        &nbsp;
                                    </tfoot>
                            </table>
                        </div>
                        {{-- Modal Section --}}
                            <div class="modal fade" id="updateModal" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title" style="color:<?php echo customizeController::themeColor(); ?>;"><strong>Visitor Card Information</strong></h2>
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
                                                                                    <label for="cardId" class="control-label col-md-6" style="text-align:left;">{{trans("table.groupId")}}:</label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" class="form-control" id="modal_groupId" name="modal_groupId">
                                                                                    </div>
                                                                            </div>
                                                                        </fieldset>

                                                                        <div class="form-group row" style="position:relative;">
                                                                                <label for="cardUID" class="control-label col-md-6" style="text-align:left;">{{trans("table.groupname")}}:</label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" class="form-control" id="modal_groupName" name="modal_groupName">
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
                                            <a href="#" id="modal_update_button" class="btn btn-success pull-right">{{ trans('table.update') }}</a>
                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        {{-- End Modal Section --}}

                        {{-- UPDATE SCRIPT --}}
                        <script>
                        $(document).ready(function() {
                            $(document).on('click', 'button[data-role=update]', function() {
                                var PtnGroupId = $(this).data('id');
                                var groupName = $('#' + PtnGroupId).children('td[data-target=groupName]').text();
                                $('#modal_groupId').val(PtnGroupId);
                                $('#modal_groupName').val(groupName);
                                $('#updateModal').modal('toggle');

                                $('#modal_update_button').click(function(){
                                    $.ajax({
                                        url : $('#api_url').val() + '/groupController/updateGroupInfo',
                                        type : 'put',
                                        data : {groupId: $('#modal_groupId').val(), groupName: $('#modal_groupName').val()},
                                        success : function(response){
                                            $('#updateModal').modal('toggle');
                                            swal("Update Complete", "Click the button to continue!", "success");
                                            setTimeout(1000);
                                            location.reload();
                                        }
                                    });
                                });
                            });

                            $(document).on('click', 'button[data-role=delete]', function() {
                                var PtnGroupId = $(this).data('id');
                                swal({
                                    title: "{{trans('table.delete_confirmation')}}",
                                    text: "Remove GroupID: " + PtnGroupId,
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                }).then((willDelete)=>{
                                    if(willDelete){
                                        $.ajax({
                                            url : $('#api_url').val() + 'groupController/deleteGroup',
                                            type : 'delete',
                                            data : {groupId: PtnGroupId},
                                            success : function(response){
                                                swal("{{trans('table.memberId')}} : " + PtnGroupId + " {{trans('table.delete_has_been_delete')}}", {
                                                    icon: "success",
                                                });
                                                location.reload();
                                            }
                                        });  
                                    }
                                });
                            });
                        });
                        </script>
                        {{-- END UPDATE SCRIPT --}}

                                {{-- INPUT FILE SCRIPT --}}
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
                                            }
                                        });
                                    });
                                </script>

                                {{-- MODAL SCRIPT --}}
                                {{-- INPUT FILE SCRIPT --}}
                                <script>
                                    $(document).on('click', '#close-preview', function(){ 
                                        $('.image-preview').popover('hide');
                                        // Hover befor close the preview    
                                    });

                                    $(function() {
                                        // Create the close button
                                        var closebtn = $('<button/>', {
                                            type:"button",
                                            text: 'x',
                                            id: 'close-preview',
                                            style: 'font-size: initial;',
                                        });
                                        closebtn.attr("class","close pull-right");

                                        // Clear event
                                        $('.image-preview-clear').click(function(){
                                            $('.image-preview').attr("data-content","").popover('hide');
                                            $('.image-preview-filename').val("");
                                            $('.image-preview-clear').hide();
                                            $('.image-preview-input input:file').val("");
                                            $(".image-preview-input-title").text("Browse"); 
                                        }); 
                                        // Create the preview image
                                        $(".image-preview-input input:file").change(function (){     
                                            var img = $('<img/>', {
                                                id: 'dynamic',
                                                width:250,
                                                height:200
                                            });      
                                            var file = this.files[0];
                                            var reader = new FileReader();
                                            // Set preview image into the popover data-content
                                            reader.onload = function (e) {
                                                $(".image-preview-input-title").text("Change");
                                                $(".image-preview-clear").show();
                                                $(".image-preview-filename").val(file.name);
                                            }        
                                            reader.readAsDataURL(file);
                                        });  
                                    });
                                </script>

                    </div>
                </div>

                {{-- CUSTOM GROUP MANAGEMENT--}}
                <div class="tab-pane visitor_section" id="custom_group_management">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            {{-- Block Group Lists--}}
                            <div class="col-md-4" style="background-color:white;">
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <h2><strong>LISTS OF GROUP</strong></h2>
                                    <hr class="hrbreakline">
                                    <ul class="list-group">
                                       <?php getAllAntiPassbackGroup(); ?>
                                    </ul>
                                </div>
                            </div>

                            {{-- Block Table--}}
                            <div class="col-md-8" style="background-color:#F5F5F5;">
                                <div class="col-md-12" style="background-color:#F5F5F5;">
                                    <div class="col-md-12" style="background-color: white;">
                                        <div class="col-md-12"></div>
                                        <div class="col-md-12">
                                            <h2><strong>MEMBER IN GROUP <label id="groupName" name="groupName"></label></strong></h2>
                                            <table class="table table-striped table-bordered table-hover display" id="customTable" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr style="background-color:<?php echo customizeController::themeColor(); ?>";>
                                                        <th nowrap style="color:white;"><strong>PATRON ID</strong></th>
                                                        <th nowrap style="color:white;"><strong>MEMBER NAME</strong></th>
                                                        <th nowrap style="color:white;"><strong>ACTION</strong></th>
                                                    </tr>
                                                </thead>

                                                <tbody id="data-group-fetch">
                                                </tbody>

                                                <tfoot>
                                                    &nbsp;
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="exTab3" class="col-md-12">	
                                <div class="col-md-12">
                                    <ul class="nav nav-pills">
                                        <li class="member_tab" style="font-size:1.5em;">
                                            <a href="#create_group" data-toggle="tab"><strong>CREATE GROUP</strong></a>
                                        </li>
                                        <li class="visitor_tab" style="font-size:1.5em;">
                                            <a href="#add_member_to_group" data-toggle="tab"><strong>ADD MEMBER TO GROUP</strong></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane create_group active" id="create_group">
                                        {{-- INSERT NEW GROUP--}}
                                            <div class="col-md-4" style="background-color:white;">
                                                <div class="col-md-12"></div>
                                                <div class="col-md-12">
                                                    <form class="form-horizontal" action="{{url('groupController/addNewAntipassbackGroup')}}" method="POST">
                                                    {{ csrf_field() }}
                                                        <div class="col-md-12">&nbsp;</div>
                                                        <div class="form-group row" style="position:relative;">
                                                            <label for="groupName" class="control-label col-md-3" style="text-align:left;">GROUP NAME :</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control input-lg" type="text" style="border-radius: 4 !important;" name="add_groupName" id="add_groupName" name="add_groupName" placeholder="GROUP NAME">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" style="position:relative;">
                                                            <label for="anti_passback_time" class="control-label col-md-3" style="text-align:left;">ANTI PASSBACK TIME :</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input class="form-control input-lg" type="text" style="border-radius: 4 !important;" id="add_anti_passback_time" name="add_anti_passback_time" placeholder="">
                                                                    <span class="input-group-btn">
                                                                        <input type="button" class="form-control input-lg" id="restricted_day_tag" name="restricted_day_tag" value="min(s)" style="background-color:<?php echo customizeController::themeColor(); ?>;color:white;border-color:<?php echo customizeController::themeColor(); ?>;">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" style="position:relative;">
                                                            <input type="submit" class="btn btn-success pull-right" style="font-size: 1.2em" value="CREATE GROUP"/>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        {{-- END INSERT --}}
                                    </div>

                                    <div class="tab-pane add_member_to_group" id="add_member_to_group">
                                        {{-- ADD MEMBER TO GROUP --}}
                                            <div class="col-md-4" style="background-color:white;">
                                                <div class="col-md-12"></div>
                                                <div class="col-md-12">
                                                    <form class="form-horizontal" action="{{url('groupController/addMemberToAntiPassbackGroup')}}" method="POST">
                                                        <div class="col-md-12">&nbsp;</div>
                                                        {{ csrf_field() }}
                                                        <div class="form-group row" style="position:relative;">
                                                            <label for="memberId" class="control-label col-md-3" style="text-align:left;">MEMBER ID :</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control input-lg" type="text" style="border-radius: 4 !important;" id="add_PtnId" name="add_PtnId" placeholder="MEMBER ID">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" style="position:relative;">
                                                            <label for="toGroup" class="control-label col-md-3" style="text-align:left;">INSERT TO GROUP :</label>
                                                            <div class="col-md-9">
                                                                <select id="add_member_to_group" class="form-control input-lg" name="add_member_to_group">
                                                                    <?php getSelectAntiPassbackGroup(); ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" style="position:relative;">
                                                            <input type="submit" class="btn btn-success pull-right" style="font-size: 1.2em" value="ADD TO GROUP"/>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        {{-- END ADD MEMBER TO GROUP --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>
    </div>
    
    {{-- ANTI PASSBACK SECTION--}}
        <script>
         $(document).ready(function(){
            $('#customTable').dataTable();
         });
        </script>
        <script>
            $(document).on('click', 'a[data-role=groupSelect]', function(){
                $("#customTable").dataTable().fnDestroy()
                var groupId =  $(this).data('id');
                var path_API = $('#api_url').val();
                var table = $('#customTable').dataTable({
                    "ajax" : {
                        "url": path_API + 'groupController/getMemberOnAntiPassbackGroup',
                        "type": "POST",
                        "data": {groupId: groupId}
                    },
                    "columns": [
                        { "data" : "PtnId" },
                        { "data" : "FName" },
                        {
                            "data": null,
                            "defaultContent": "<button class='btn btn-danger align-middle'>Remove</button>"
                        }
                    ]
                });

                $('#customTable tbody').on( 'click', 'button', function () {
                    var data = table.DataTable().row( $(this).parents('tr') ).data();
                    var PtnId = data["PtnId"];
                    // alert(data["PtnId"]);
                    $.ajax({
                        url : $('#api_url').val() + 'groupController/deleteMemberFromGroupAntiPassback',
                        //url:  config('pathConfig.pathREST') +'checkLogin/check'
                        type : 'delete',
                        data : {PtnId: PtnId},
                        success : function(response){
                            swal("{{trans('table.memberId')}} : " + PtnId + " has been removed from GROUP", {
                                icon: "success",
                            });
                            location.reload();
                        }
                    });
                } );  
            });  
        </script>
    {{-- END OF ANTI PASSBACK SECTION --}}


<?php 
    function getAllAntiPassbackGroup () {
        $groupAntiPassbackLists = groupController::getAllAntiPassbackGroup();
        foreach ($groupAntiPassbackLists["data"] as $key => $value){
            echo "<a href='#' data-role='groupSelect' data-id='".$value["groupId"]."' class='antipassback-group list-group-item justify-content-between'>".$value["groupName"]."</a>";
        }
    }

    function getSelectAntiPassbackGroup () {
        $groupAntiPassbackLists = groupController::getAllAntiPassbackGroup();
        foreach ($groupAntiPassbackLists["data"] as $key => $value){
            echo "<option value=".$value["groupId"].">".$value["groupName"]."</option>";
        }
    }

?>
@endsection

@section('extra_script')
@endsection