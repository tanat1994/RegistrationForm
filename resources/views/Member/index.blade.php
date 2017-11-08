@extends('core')

@section('more_script')
  <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
  <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}"/>
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
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.member') }}</strong></a> </h2>
            <hr class="hrbreakline">
        </div>
        
        <div class="col-md-12">
            <div class="col-md-1">
            &nbsp;
            </div>

            <div class="col-md-10" style="background-color:white; padding-top:1%;">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Datetime</th>
                                <th>Station_id</th>
                                <th>Type</th>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Book ID</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Datetime</th>
                                <th>Station_id</th>
                                <th>Type</th>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Book ID</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        @foreach($bookShow as $recBook)
                        <tr>
                            <td>{{ $recBook['datetime'] }}</td>
                            <td>{{ $recBook['station_id'] }}</td>
                            <td>{{ $recBook['type'] }}</td>
                            <td>{{ $recBook['member_id'] }}</td>
                            <td>{{ $recBook['member_name'] }}</td>
                            <td>{{ $recBook['book_id'] }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                <script>
                    @include('myJSfile')
                    $(document).ready(function() {
                        $('#table').DataTable();
                    } );
                </script>

            </div>

            <div class="col-md-1">
            &nbsp;
            </div>
        </div>

    </div>
@endsection