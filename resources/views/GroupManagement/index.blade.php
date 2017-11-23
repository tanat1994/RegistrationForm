@extends('core')

@section('more_script')
    {{--  <link type="text/css" rel="stylesheet" src="{{asset('css/treeView/bootstrap-treeview.css')}}"/>
    <script type="javascript" src="{{asset('js/treeView/bootstrap-treeView.js')}}"></script>

    <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
    <script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>  --}}
    <link class="cssdeck" rel="stylesheet" href="{{asset('css/treeTable/tree.bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/treeTable/bootstrap-responsive.min.css')}}" class="cssdeck">
@endsection


@section('activegroup')
tabbuttonactive
@endsection


@section('htmlheader_title')
{{ trans('menu.group') }}
@endsection


@section('content')
    <div class="row-fluid">
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.group') }}</strong></a> </h2>
            <hr class="hrbreakline">

            <!-- TREE SECTION -->
            <div class="col-md-3" style="background-color:#F5F5F5; padding-left:0;">
                <div class="col-md-10" style="background-color:white;">
                    @include('GroupManagement.index3')
                </div>
            </div>

            <!-- MANAGE SECTION -->
            <div class="col-md-9" style="background-color:white">
                <div class="col-md-12">
                    <h3 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.group') }}</strong></a> </h3>
                    <hr class="hrbreakline">
                </div>

                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.no') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.memberId') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.cardId') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.name') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.position') }}</strong></th>
                        <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.status') }}</strong></th>
                        {{--  <th data-breakpoints="xs" nowrap style="background-color:#2e7ed0"><strong>{{ trans('table.name') }}</strong></th>
                        <th data-breakpoints="xs sm" data-type="date" data-format-string="MMMM Do YYYY" nowrap style="background-color:#2e7ed0"><strong>{{ trans('table.position') }}</strong></th>
                        <th data-breakpoints="xs sm md" data-type="date" data-format-string="MMMM Do YYYY" nowrap style="background-color:#2e7ed0"><strong>{{ trans('table.status') }}</strong></th>  --}}
                    </tr>
                </thead>
                    <tbody>
                        {{--  @foreach($memberRecord as $record)
                            <tr>
                                <td>{{ $record['no'] }}</td>
                                <td>{{ $record['memberId'] }}</td>
                                <td>{{ $record['cardId'] }}</td>
                                <td>{{ $record['firstname'] }}   {{ $record['lastname'] }}</td>
                                <td>{{ $record['position'] }}</td>
                                <td>{{ $record['status'] }}</td>
                            </tr>
                        @endforeach  --}}
                        <tr>
                            <td>dfsfsfs</td>
                            <td>dfsfsfs</td>
                            <td>dfsfsfs</td>
                            <td>dfsfsfs</td>
                            <td>dfsfsfs</td>
                            <td>dfsfsfs</td>
                        </tr>
                    </tbody>

                    <tfoot>
                    </tfoot>
            </table>
                    {{--  <script>
                    jQuery(function($){
                        $('.table').footable();
                    });
                    </script>  --}}

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
            </div>

            <script src="{{ asset('js/tablesorter.js') }}">
            </script>


        </div>
    </div>
@endsection