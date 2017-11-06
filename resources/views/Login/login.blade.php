<!DOCTYPE html>
<html>
@extends('header.logoheader')

@section('htmlheader_title')
    {{ trans('login.headerTitle') }}
@endsection

    <body>
        @include('header.languagebar')

        <div style="width: 450px; margin: 10% auto;">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <div class="panel panel-primary" style="border-radius: 10; border-width:1px;">
                <div class="panel-body">
                    <p class="lead text-center" style="margin:5% auto;">{{ trans('login.headerLogin') }}</p>
                    <hr>
                    <form action="{{ url('/login') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="{{ trans('login.username') }}" name="username" id="username" autofocus="true" />
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="{{ trans('login.password') }}" name="password" id="password"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-7 col-sm-5" style="margin-bottom: 2%;">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('login.signin') }}</button>
                            </div><!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        @include('layouts.script_auth')
    </body>

</html>