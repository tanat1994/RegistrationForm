@extends('core')
@section('more_script')
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
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/cardmanagement') }}" style="text-decoration:none;color:#2e7ed0;" id="cardManagementTitle"><strong>{{ trans('menu.cardmanagement') }}</strong></a></h2>
            <hr class="hrbreakline">
        </div>

    </div>
@endsection