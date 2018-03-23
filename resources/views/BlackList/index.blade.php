<?php use \App\Http\Controllers\memberController; ?>
@extends('core')

@section('more_script')
  {{-- SweetAlert --}}
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
  {{--DATATABLES--}}
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
  
  <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>

  {{-- Toggle button --}}
  <link type="text/css" href="{{asset('css/bootstrap-toggle/bootstrap-toggle.min.css')}}" rel="stylesheet">
  <script src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

  <script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>


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

            {{-- Button Animated --}}
            .animateButton {
                box-shadow: 0 1.5px #999;
            }
            .animateButton:active {
                box-shadow: 0 1px #666;
                transform: translateY(3px);
            }
            
            .tabbutton {
                color: {{config('pathConfig.menu_underline_bar')}};;
            }
            .tabbutton::after{
                background: {{config('pathConfig.menu_underline_bar')}};
            }
            .tabbuttonactive::after{
                background: {{config('pathConfig.menu_underline_bar')}};
            }

    </style>


@endsection

@section('htmlheader_title')
{{ trans('menu.blacklist') }}
@endsection

@section('activeblacklist')
tabbuttonactive
@endsection

@section('content')
    <div class="row-fluid">
        <?php 
            $permission = Session::get('menuPermission')["rc"]["bl"];
        ?>
        <div class="col-md-12 divunderline">
            <h2 style="color:{{config('pathConfig.title_word_color')}}; margin-left: 0.2%"><a href="{{ URL::to('/blacklist') }}" style="text-decoration:none;color:{{config('pathConfig.title_word_color')}};"><strong>{{ trans('menu.blacklist') }}</strong></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-12">
            <div class="col-md-1">
                &nbsp;
                {{-- API PATH FOR USING IN AJAX OR JS --}}
                <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>
            </div>
            
        <div class="col-md-10" style="background-color:white; padding-top:1%;" id="myDivTable">
            <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                <thead>
                    <tr style="background-color:{{config('pathConfig.table_header_color')}}; color:{{config('pathConfig.table_header_title_color')}};">
                        <th nowrap style="width:8%;"><strong>NO</strong></th>
                        <!-- <th nowrap style="width:8%;"><strong>BLACKLIST ID</strong></th> -->
                        <th nowrap style="width:8%;"><strong>{{ trans('table.memberId') }}</strong></th>
                        <th nowrap style="width:15%;"><strong>{{ trans('table.name') }}</strong></th>
                        <th nowrap style="width:15%; display:none;"><strong>firstname</strong></th>
                        <th nowrap style="width:15%; display:none;"><strong>lastName</strong></th>
                        <th nowrap style="width:10%;"><strong>{{ trans('table.position') }}</strong></th>
                        <th nowrap style="width:14%;"><strong>LISTED DATE</strong></th>
                        <th nowrap style="width:14%;"><strong>END OF BANNED</strong></th>
                        <!-- <th nowrap style=" width:14%;"><strong>UNLISTED DATE</strong></th> -->
                        <th nowrap style="width:20%;"><strong>BLACKLIST TITLE</strong></th>
                        <th nowrap style="width:20%; display:none;"><strong>BLACKLIST DESCRIPTION</strong></th>
                        <th nowrap style=""><strong>ACTION</strong></th>
                    </tr>
                </thead>

                <tbody>
                        <?php $iterator = 1; ?>
                        @foreach($blacklistRecord as $record)
                        <tr id="{{$record['memberId']}}" style="font-size: 15px;">
                                    <td data-target="no"><?php echo $iterator;?></td>
                                    <!-- <td data-target="blacklistId" style="width:2%;">{{ $record['blacklistId'] }}</td> -->
                                    <td data-target="memberId">{{ $record['memberId'] }}</td>
                                    <td data-target="fullname">{{ $record['FName'] }}  {{ $record['LName'] }}</td>
                                    <td data-target="FName" style="display:none">{{ $record['FName'] }}</td>
                                    <td data-target="LName" style="display:none">{{ $record['LName'] }}</td>
                                    @if(App::getLocale() == 'en')
                                    <td data-target="">{{ $record['PatronclassEn'] }}</td>
                                    @else
                                    <td data-target="">{{ $record['PatronclassTh'] }}</td>
                                    @endif
                                    <td data-target="">{{ $record['date_time'] }}</td>
                                    <td data-target="">{{ $record['end_of_banned'] }}</td>
                                    <td data-target="blacklist_description" style="display:none;">{{ $record['note'] }}</td>
                                    <td data-target="blacklist_title" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 30%;">{{ $record['title'] }}</td>
                                    <td style="text-align:center; width: 240px;">
                                        <button class="btn btn-info animateButton" data-role="information" data-id="{{$record['memberId']}}" style="font-size:18px; margin-right:5px;"><i class="fa fa-info-circle"></i></button>
                                        @if(strpos($permission, 'edit') !== false)
                                        <button class="btn btn-primary animateButton" data-role="update" data-id="{{$record['memberId']}}" style="font-size:18px; margin-right:5px;"><i class="fa fa-pencil"></i></button>
                                        @else
                                        <button class="btn btn-primary animateButton" data-role="update" data-id="{{$record['memberId']}}" style="font-size:18px; margin-right:5px;" disabled><i class="fa fa-pencil"></i></button>
                                        @endif

                                        @if(strpos($permission, 'ul') !== false)
                                        <button class="btn btn-success animateButton" data-role="unlisted" data-id="{{$record['memberId']}}" style="font-size:18px; margin-right:5px;"><i class="fa fa-check"></i></button>
                                        @else
                                        <button class="btn btn-success animateButton" data-role="unlisted" data-id="{{$record['memberId']}}" style="font-size:18px; margin-right:5px;" disabled><i class="fa fa-check"></i></button>
                                        @endif
                                    </td>
                        </tr>
                        <?php $iterator++; ?>
                        @endforeach
                </tbody>
                    

                <tfoot>
                </tfoot>
            </table>

            {{-- Information Modal --}}
            <div class="modal fade" id="myInformationModal" role="dialog">
                    <div class="modal-dialog modal-md">
                        <!-- Modal content-->
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title" style="color:#2e7ed0;"><strong>BLACKLIST INFORMATION</strong></h2>
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
                                                                            <label for="memberId" class="control-label col-md-5" style="text-align:left;">memberId:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="info_blacklist_memberId" name="info_blacklist_memberId">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="firstName" class="control-label col-md-5" style="text-align:left;">{{trans("register.firstname")}}:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="info_blacklist_firstName" name="info_blacklist_firstName">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="lastName" class="control-label col-md-5" style="text-align:left;">{{trans("register.lastname")}}:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="info_blacklist_lastName" name="info_blacklist_lastName">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="blacklist_title" class="control-label col-md-5" style="text-align:left;">Blacklist Title:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="info_blacklist_title" name="info_blacklist_title">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="blacklist_description" class="control-label col-md-8" style="text-align:left;">{{trans("table.note")}}:</label>
                                                                            <div class="col-md-12">
                                                                                <textarea class="form-control" id="info_blacklist_description" name="info_blacklist_description" style="width:100%; height: 200px; resize: none;"></textarea>
                                                                            </div>
                                                                    </div>
                                                                </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>         
                                </form>
                            </div> 

                            <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    
                    </div>
            </div>
            {{-- End Information Modal --}}

                {{-- Update Modal --}}
                <div class="modal fade" id="myActionModal" role="dialog">
                    <div class="modal-dialog modal-md">
                        <!-- Modal content-->
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h2 class="modal-title" style="color:#2e7ed0;"><strong>EDIT BLACKLIST INFORMATION</strong></h2>
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
                                                                            <label for="memberId" class="control-label col-md-5" style="text-align:left;">memberId:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="blacklist_memberId" name="blacklist_memberId">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="firstName" class="control-label col-md-5" style="text-align:left;">{{trans("register.firstname")}}:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="blacklist_firstName" name="blacklist_firstName">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="lastName" class="control-label col-md-5" style="text-align:left;">{{trans("register.lastname")}}:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="blacklist_lastName" name="blacklist_lastName">
                                                                            </div>
                                                                    </div>
                                                                </fieldset>
                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="blacklist_title" class="control-label col-md-5" style="text-align:left;">Blacklist Title:</label>
                                                                            <div class="col-md-7">
                                                                                <input type="text" class="form-control" id="blacklist_title" name="blacklist_title">
                                                                            </div>
                                                                    </div>

                                                                    <div class="form-group row" style="position:relative;">
                                                                            <label for="blacklist_description" class="control-label col-md-8" style="text-align:left;">{{trans("table.note")}}:</label>
                                                                            <div class="col-md-12">
                                                                                <textarea class="form-control" id="blacklist_description" name="blacklist_description" style="width:100%; height: 200px; resize: none;"></textarea>
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
                                    <a href="#" id="edit_info" class="btn btn-success pull-right">Edit</a>
                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">{{trans('table.cancel')}}</button>
                                </div>
                        </div>
                    
                    </div>
                </div>
                {{-- End Update Modal --}}

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
                                }
                            });
                        });
                    </script>

        </div>
            <div class="col-md-1">
            &nbsp;
            </div>
        </div>

        {{-- BLACKLIST INFORMATION --}}
        <script>
                $(document).ready(function(){
                    $(document).on('click', 'button[data-role=information]', function(){
                        var memberId = $(this).data('id');
                        var firstName = $('#' + memberId).children('td[data-target=FName]').text();
                        var lastName = $('#' + memberId).children('td[data-target=LName]').text();
                        var blacklist_title = $('#' + memberId).children('td[data-target=blacklist_title]').text();
                        var blacklist_description = $('#' + memberId).children('td[data-target=blacklist_description]').text();
                        $('#info_blacklist_memberId').val(memberId);
                        $('#info_blacklist_firstName').val(firstName);
                        $('#info_blacklist_lastName').val(lastName);
                        $('#info_blacklist_title').val(blacklist_title);
                        $('#info_blacklist_description').val(blacklist_description);
                        $('#myInformationModal').modal('toggle');
                    });
                });
        </script>
        {{-- END BLACKLIST INFORMATION--}}

        {{-- BLACKLIST EDITOR --}}
        <script>
                $(document).ready(function(){
                    $(document).on('click', 'button[data-role=update]', function(){
                        var memberId = $(this).data('id');
                        var firstName = $('#' + memberId).children('td[data-target=FName]').text();
                        var lastName = $('#' + memberId).children('td[data-target=LName]').text();
                        var blacklist_title = $('#' + memberId).children('td[data-target=blacklist_title]').text();
                        var blacklist_description = $('#' + memberId).children('td[data-target=blacklist_description]').text();
                        $('#blacklist_memberId').val(memberId);
                        $('#blacklist_firstName').val(firstName);
                        $('#blacklist_lastName').val(lastName);
                        $('#blacklist_title').val(blacklist_title);
                        $('#blacklist_description').val(blacklist_description);
                        $('#myActionModal').modal('toggle');
                    });

                    $('#edit_info').click(function(){
                        $.ajax({
                            url : 'http://127.0.0.1/Website-NAT/public/index.php/blackListController/blacklistInfoUpdate',
                            type : 'put',
                            data : {memberId: $('#blacklist_memberId').val(), title: $('#blacklist_title').val(), note: $('#blacklist_description').val()},
                            success : function(response){
                                $('#myActionModal').modal('toggle');
                                location.reload();
                            }
                        });
                    });
                });
        </script>
        {{-- END BLACKLIST EDITOR--}}

        {{-- Unlisted Script --}}
        <script>
            $(document).ready(function(){
                $(document).on('click', 'button[data-role=unlisted]', function(){
                    var memberId = $(this).data('id');
                    swal({
                        title: "Unlisted Confirmation!",
                        text: "Do you sure you want to unlisted this memberId: " + memberId,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete)=>{
                        if(willDelete){
                            $.ajax({
                                url : $('#api_url').val() + 'blackListController/unlistedFromBlacklist',
                                type : 'put',
                                data : {memberId: memberId},
                                success : function(response){
                                    location.reload();
                                }
                            });  
                        }
                    });
                });
            });
        </script>
        {{-- End unlisted script --}}

    </div>


@endsection

