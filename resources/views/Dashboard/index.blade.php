<?php use \App\Http\Controllers\memberController; ?>
@extends('core')

@section('more_script')
{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>
@endsection

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
                        <span class="info-box-number"><h3><?php echo memberNumber(); ?></h3></span>
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
        <div class="col-md-6"  style="background-color:white; padding-top: 2%;">
            <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                     <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.no') }}</strong></th>
                                    <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.memberId') }}</strong></th>
                                    <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.cardUID') }}</strong></th>
                                    <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.name') }}</strong></th>
                                    <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.degree') }}</strong></th>
                                    <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.faculty') }}</strong></th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php $iterator = 1;?>
                                    @foreach($memberRecord as $record)
                                        <tr>
                                            <td><?php echo $iterator;?></td>
                                                <td><div contenteditable data-column="memberId">{{ $record['memberId'] }}</div></td>
                                                <td>{{ $record['cardUID'] }}</td>
                                                <td>{{ $record['positionName'] }}</td>
                                                <td>{{ $record['firstname'] }}   {{ $record['lastname'] }}</td>
                                                <td>{{ $record['facultyName'] }}</td>
                                            <?php $iterator++; ?>
                                        </tr>
                                    @endforeach
                                </tbody>
            
                                <tfoot>
                                </tfoot>
                        </table>
            </div>
        </div>

        {{-- Third Column--}}
        <div class="col-md-3"  style="background-color:green;">
            <div class="col-md-12">
            </div>
        </div>
    </div>



    {{-- Datatables Script --}}
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
@endsection

<?php
function memberNumber(){
    $init_check = true;
    $memberArry = memberController::memberNumber();
    echo($memberArry["data"][0]["NumberOfMember"]); //single print
}
?>