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

@section('activeblacklist')
tabbuttonactive
@endsection

@section('content')
    <div class="row-fluid">

        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/blacklist') }}" style="text-decoration:none;color:#2e7ed0;"><strong>BlackList</strong></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-12">
            <div class="col-md-1">
            &nbsp;
            </div>
            
        <div class="col-md-10" style="background-color:white; padding-top:1%;" id="myDivTable">
            <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:8%;"><strong>BlacklistID</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:8%;"><strong>{{ trans('table.memberId') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:15%;"><strong>{{ trans('table.name') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:15%; display:none;"><strong>firstname</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:15%; display:none;"><strong>lastName</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:10%;"><strong>{{ trans('table.position') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:14%;"><strong>Listed Date</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:20%;"><strong>BLACKLIST TITLE</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white; width:20%; display:none;"><strong>BLACKLIST DESCRIPTION</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>ACTION</strong></th>
                    </tr>
                </thead>

                <tbody>
                        @foreach($blacklistRecord as $record)
                        <tr id="{{$record['memberId']}}" style="font-size: 15px;">
                                    <td data-target="blacklistId">{{ $record['blacklistId'] }}</td>
                                    <td data-target="memberId">{{ $record['memberId'] }}</td>
                                    <td data-target="fullname">{{ $record['firstname'] }}  {{ $record['lastname'] }}</td>
                                    <td data-target="firstname" style="display:none">{{ $record['firstname'] }}</td>
                                    <td data-target="lastname" style="display:none">{{ $record['lastname'] }}</td>
                                    <td data-target="">{{ $record['positionName'] }}</td>
                                    <td data-target="">{{ $record['date_time'] }}</td>
                                    <td data-target="blacklist_description" style="display:none;">{{ $record['note'] }}</td>
                                    <td data-target="blacklist_title" style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $record['title'] }}</td>
                                    <td style="text-align:center">
                                            <span class="outer-line"><a href="#" data-role="update" data-id="{{$record['memberId']}}" style="font-size:25px; margin-right:8px;"><i class="fa fa-pencil"></i></a></span>
                                    </td>
                        </tr>
                        @endforeach
                </tbody>
                    

                    <tfoot>
                    </tfoot>
            </table>

                <div class="modal fade" id="myActionModal" role="dialog">
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
                        </div>
                    
                    </div>
                </div>
                {{-- End myActionModal --}}

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

        <script>
                $(document).ready(function(){
                    $(document).on('click', 'a[data-role=update]', function(){
                        var memberId = $(this).data('id');
                        var firstName = $('#' + memberId).children('td[data-target=firstname]').text();
                        var lastName = $('#' + memberId).children('td[data-target=lastname]').text();
                        var blacklist_title = $('#' + memberId).children('td[data-target=blacklist_title]').text();
                        var blacklist_description = $('#' + memberId).children('td[data-target=blacklist_description]').text();
                        $('#blacklist_memberId').val(memberId);
                        $('#blacklist_firstName').val(firstName);
                        $('#blacklist_lastName').val(lastName);
                        $('#blacklist_title').val(blacklist_title);
                        $('#blacklist_description').val(blacklist_description);
                        $('#myActionModal').modal('toggle');
                    });
                });
        </script>

    </div>


@endsection

