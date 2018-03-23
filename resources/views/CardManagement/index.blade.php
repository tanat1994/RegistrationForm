@extends('core')
@section('more_script')
<link type="text/css" rel="stylesheet" href="{{asset('css/parsley/parsley.css')}}"></script>
<script src="{{asset('js/parsley/parsley.min.js')}}"></script>

{{--DATATABLES--}}
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
<link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
<script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>

<style>
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
{{ trans('menu.cardmanagement') }}
@endsection

@section('activecardmanagement')
tabbuttonactive
@endsection

@section('content')
    <div class="row-fluid" id="myDisplaySection"> <!-- <div class="row-fluid">-->
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/cardmanagement') }}" style="text-decoration:none;color:{{config('pathConfig.title_word_color')}};" id="cardManagementTitle"><strong>{{ trans('menu.cardmanagement') }}</strong></a></h2>
            <hr class="hrbreakline">
        </div>

        <div class="col-md-12">

            {{-- Register New Visitor Card--}}
            <div class="col-md-4">
                <div class="col-md-12" style="background-color:white;">
                    <h3><strong>VISITOR CARD REGISTRATION</strong></h3>
                    <hr class="hrbreakline">
                    <div class="col-md-12"> 
                        <form class="form-horizontal" method="POST">

                            {{-- CardName --}}
                            <div class="form-group row" style="position:relative;">
                                <div class="col-md-3">
                                    <label for="cardName" class="control-label">CARD NAME : </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="CARD NAME" name="vis_cardName" id="vis_cardName"/>
                                </div>
                            </div>

                            {{-- CardUID --}}
                            <div class="form-group row" style="position:relative;">
                                <div class="col-md-3">
                                    <label for="cardUID" class="control-label">CARD UID : </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="CARD UID" name="vis_cardUID" id="vis_cardUID"/>
                                </div>
                            </div>

                            <div class="form-group row" style="position:relative;">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success pull-right" value="SUBMIT"/>
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
                                    <tr style="background-color:{{config('pathConfig.table_header_color')}};color:{{config('pathConfig.table_header_title_color')}};">
                                        <th nowrap style="">VISITOR CARD NO.</th>
                                        <th nowrap style="">VISITOR CARD NAME</th>
                                        <th nowrap style="">VISITOR ID</th>
                                        <th nowrap style="">ACTION</th>
                                    </tr>
                                </thead>

                                <tbody>
                                </tbody>

                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
@endsection

