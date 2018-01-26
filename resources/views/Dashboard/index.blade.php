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
        <div class="col-md-3"  style="background-color:green;">
            <div class="col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                            <!-- The progress section is optional -->
                            <div class="progress">
                            <div class="progress-bar" style="width: 30%"></div>
                            </div>
                            <span class="progress-description">
                                70% Increase in 30 Days
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                </div>
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