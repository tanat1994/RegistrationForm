@extends('core')
@section('more_script')
<link type="text/css" rel="stylesheet" href="{{asset('css/parsley/parsley.css')}}"></script>
<script src="{{asset('js/parsley/parsley.min.js')}}"></script>
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

        <div class="col-md-12">
            <form action="{{ URL::to('/memberregister') }}" method="get" class="demo-form" id="main" name="main" data-parsley-validate="">
                NAME: <input type="text" id="fname" name="lname" data-parsley-trigger="change" required="" data-parsley-minlength="2" data-parsley-maxlength="20" data-parsley-minlength-message="At least 2 char" data-parsley-maxlength-message="Maximum 20 chars"/>
                EMAIL: <input type="email" id="email" name="email" data-parsley-trigger="change" required=""/>
                <input type="submit" class="btn btn-success" value="validate"/>
            </form>

            <script type="text/javascript">
            $(function () {
                $('#main').parsley().on('field:validated', function () {
                })
                .on('form:submit', function() {
                    return true;
                });
            });
            </script>
        </div>
    </div>
@endsection