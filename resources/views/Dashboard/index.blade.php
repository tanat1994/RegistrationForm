<?php use \App\Http\Controllers\memberController; ?>
<?php use \App\Http\Controllers\customizeController; ?>
<?php use \App\Http\Controllers\groupController; ?>
<?php use \App\Http\Controllers\visitorController; ?>
@extends('core')

@section('more_script')
{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>

<style>
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
        <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>
            <div class="col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><strong>{{ trans('dashboard.all_member')}}</strong></span>
                        <span class="info-box-number"><h3><strong><?php echo memberNumber(); ?></strong></h3></span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><strong>Group Number</strong></span>
                            <span class="info-box-number"><h3><strong><?php echo groupNumber(); ?></strong></h3></span>
                        </div>
                    </div>
            </div>

            <div class="col-md-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><strong>Register Today</strong></span>
                            <span class="info-box-number"><h3><strong><?php echo visitorNumber(); ?></strong></h3></span>
                        </div>
                    </div>
            </div>
        </div>

        {{-- Second Column--}}
        <div class="col-md-6"  style="background-color:white; padding-top: 2%;">
            <?php $null_status_record = 0; ?>
            <div class="col-md-12" style="background-color:white;">
                Return Card
            </div>
            
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

        {{-- Return Card Section --}}
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
@endsection

<?php
function memberNumber(){
    $init_check = true;
    $memberArry = memberController::memberNumber();
    echo($memberArry["data"][0]["NumberOfMember"]); //single print
}
?>

<?php
function groupNumber(){
    $groupArry = groupController::groupNumber();
    echo($groupArry["data"][0]["GroupCount"]);
}
?>

<?php
function visitorNumber(){
    $visitorArry = visitorController::countVisitorToday();
    echo($visitorArry["data"][0]["visitor_today"]);
}
?>