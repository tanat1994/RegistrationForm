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

            {{-- Register New Visitor Card--}}
            <div class="col-md-4">
                <div class="col-md-12" style="background-color:white;">
                    <h3><strong>VISITOR CARD REGISTRATION</strong></h3>
                    <hr class="hrbreakline">

                    <form class="form-horizontal" method="POST">

                        {{-- CardName --}}
                        <div class="form-group row" style="position:relative;">
                            <div class="col-md-3">
                                <label for="cardName" class="control-label">CARD NAME : </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="CARD NAME" name="vis_cardName" id="vis_cardName"/>
                            </div>
                        </div>

                        {{-- CardUID --}}
                        <div class="form-group row" style="position:relative;">
                            <div class="col-md-3">
                                <label for="cardUID" class="control-label">CARD UID : </label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="CARD UID" name="vis_cardUID" id="vis_cardUID"/>
                            </div>
                        </div>

                        <div class="form-group row" style="position:relative;">
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-primary pull-right" value="SUBMIT"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            {{-- List of visitor card--}}
            <div class="col-md-8" style="background-color:green;">
                <div class="col-md-12" style="background-color:white;">
                    TABLE
                </div>
            </div>
        </div>
    </div>
@endsection