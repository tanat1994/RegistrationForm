@extends('core')

@section('activedash')
tabbuttonactive
@endsection

@section('htmlheader_title')
{{ trans('menu.dashboard') }}
@endsection

@section('content')
    <div class="col-md-12">
        {{-- First Column--}}
        <div class="col-md-3"  style="background-color:red;">
            <div class="col-md-12">
            </div>

            <div class="col-md-12">
            </div>

            <div class="col-md-12">
            </div>

            <div class="col-md-12">
            </div>
        </div>

        {{-- Second Column--}}
        <div class="col-md-5"  style="background-color:blue;">
            <div class="col-md-12">
            </div>
        </div>

        {{-- Third Column--}}
        <div class="col-md-4"  style="background-color:green;">
            <div class="col-md-12">
            </div>
        </div>
    </div>
@endsection