<?php use \App\Http\Controllers\customizeController; ?>
@extends('core')
@section('more_script')
<link type="text/css" rel="stylesheet" href="{{asset('css/parsley/parsley.css')}}"></script>
<script src="{{asset('js/parsley/parsley.min.js')}}"></script>
<script src="{{asset('js/sweetalert.min.js')}}"></script>

{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>

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
    
    
    {{-- Button Animated --}}
    .animateButton {
        box-shadow: 0 1.5px #999;
    }
    .animateButton:active {
        box-shadow: 0 1px #666;
        transform: translateY(3px);
    }
</style>
@endsection

@section('htmlheader_title')
{{ trans('menu.cardmanagement') }}
@endsection

@section('activecardmanagement')
tabbuttonactive
@endsection

@section('content')
    <div class="row-fluid" id="myDisplaySection"> <!-- <div class="row-fluid">-->
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/cardmanagement') }}" style="text-decoration:none;color:<?php echo customizeController::themeColor(); ?>;" id="cardManagementTitle"><strong>{{ trans('menu.cardmanagement') }}</strong></a></h2>
            <hr class="hrbreakline">
        </div>

        {{-- API PATH FOR USING IN AJAX OR JS --}}
        <input type="hidden" id="api_url" name="api_url" value="{{config('pathConfig.pathAPI')}}"/>

        <div class="col-md-12">

            {{-- Register New Visitor Card--}}
            <div class="col-md-4">
                <div class="col-md-12" style="background-color:white;">
                    <h3><strong>{{trans('register.visitor_card_registration')}}</strong></h3>
                    <hr class="hrbreakline">
                    <div class="col-md-12"> 
                        <form class="form-horizontal" method="POST" action="{{url('visitorController/postVisitorCardInsert')}}">
                            {!! csrf_field() !!}
                            {{-- CardName --}}
                            <div class="form-group row" style="position:relative;">
                                <div class="col-md-4">
                                    <label for="cardName" class="control-label">{{trans('register.visitorCardName')}} : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{trans('register.visitorCardName')}}" name="vis_cardName" id="vis_cardName"/>
                                </div>
                            </div>

                            {{-- CardUID --}}
                            <div class="form-group row" style="position:relative;">
                                <div class="col-md-4">
                                    <label for="cardUID" class="control-label">{{ trans('register.visitor_card_uid')}} : </label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="{{ trans('register.visitor_card_uid')}}" name="vis_cardUID" id="vis_cardUID"/>
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
            
            {{-- List of visitor card--}}
            <div class="col-md-8">
                <div class="col-md-12" style="background-color:white;">
                    <div class="col-md-12">
                        <?php $null_status_record = 0; ?>
                        <div class="col-md-12" style="background-color:white;">
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-12">&nbsp;</div>
                            <table class="table table-striped table-bordered table-hover display" id="visitorCard_table" cellspacing="0">
                                <thead id="table_header">
                                    <tr style="background-color:<?php echo customizeController::themeColor(); ?>;color:{{config('pathConfig.table_header_title_color')}};">
                                        <th nowrap style="">{{trans('register.visitorNo')}}</th>
                                        <th nowrap style="">{{trans('register.visitorCardName')}}</th>
                                        <th nowrap style="">ACTION</th>
                                        <th style="display:none;">VISITOR CARD ID</th>
                                        <th style="display:none;">VISITOR CARD UID</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $iterator = 1; ?>
                                    @foreach($cardLists as $record)
                                        <tr id="{{$record['cardId']}}">
                                            <td data-target="no."><?php echo $iterator++; ?></td>
                                            <td data-target="visitorCardName">{{$record["cardName"]}}</td>
                                            <td style="text-align:center;">
                                                <button class="btn btn-success animateButton" data-role="update" data-id="{{$record['cardId']}}" style="margin-right:5px;" ><i class="fa fa-pencil" style="font-size:14px;"></i></button>
                                                <button class="btn btn-danger animateButton" data-role="delete" data-id="{{$record['cardId']}}" style="font-size:14px; margin-right:5px;" ><i class="fa fa-trash"></i></button>
                                            </td>
                                            <td data-target="visitorCardId" style="display:none">{{$record["cardId"]}}</td>
                                            <td data-target="visitorCardUID" style="display:none">{{$record["cardUID"]}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                                                                    <label for="cardId" class="control-label col-md-6" style="text-align:left;">{{trans("register.visitor_card_id")}}:</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control" id="modal_cardId" name="modal_cardId">
                                                                    </div>
                                                            </div>
                                                        </fieldset>

                                                        <div class="form-group row" style="position:relative;">
                                                                <label for="cardUID" class="control-label col-md-6" style="text-align:left;">{{trans("register.visitor_card_uid")}}:</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" id="modal_cardUID" name="modal_cardUID">
                                                                </div>
                                                        </div>

                                                        <div class="form-group row" style="position:relative;">
                                                                <label for="cardName" class="control-label col-md-6" style="text-align:left;">{{trans("register.visitorCardName")}}:</label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" id="modal_cardName" name="modal_cardName">
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
    </div>



<script>
    $(document).ready(function(){
        $('#visitorCard_table').DataTable({
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

<script>
    $(document).ready(function() {
        $(document).on('click', 'button[data-role=update]', function() {
            var visitorCardId = $(this).data('id');
            var visitorCardUID = $('#' + visitorCardId).children('td[data-target=visitorCardUID]').text();
            var visitorCardName = $('#' + visitorCardId).children('td[data-target=visitorCardName]').text();
            $('#modal_cardId').val(visitorCardId);
            $('#modal_cardUID').val(visitorCardUID);
            $('#modal_cardName').val(visitorCardName);
            $('#updateModal').modal('toggle');

            $('#modal_update_button').click(function(){
                $.ajax({
                    url : $('#api_url').val() + 'cardController/updateVisitorCardInfo',
                    type : 'put',
                    data : {cardId: $('#modal_cardId').val(), cardUID: $('#modal_cardUID').val(), cardName: $('#modal_cardName').val()},
                    success : function(response){
                        $('#updateModal').modal('toggle');
                        swal("{{trans('register.success')}}", "You clicked the button!", "success");
                        setTimeout(1000);
                        location.reload();
                        
                    }
                });
            });
        });

        $(document).on('click', 'button[data-role=delete]', function() {
            var visitorCardId = $(this).data('id');
            swal({
                title: "{{trans('table.delete_confirmation')}}",
                text: "{{trans('register.remove_visitorCard_dialog')}} " + visitorCardId,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete)=>{
                if(willDelete){
                    $.ajax({
                        url : $('#api_url').val() + 'cardController/deleteVisitorCard',
                        type : 'delete',
                        data : {cardId: visitorCardId},
                        success : function(response){
                            swal("{{trans('table.memberId')}} : " + visitorCardId + " {{trans('table.delete_has_been_delete')}}", {
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

@endsection

