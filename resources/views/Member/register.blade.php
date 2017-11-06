@extends('core')

@section('htmlheader_title')
{{ trans('register.register') }}
@endsection

@section('activemember')
tabbuttonactive
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row-fluid">
            <!-- 1st HEADER -->
            <div class="col-md-12">
                <h2 style="color:#2e7ed0;"><a href="{{ URL::to('/membermanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.member') }}</a>  >  {{ trans('register.register') }}</strong></h2>
                <hr class="hrbreakline">
            </div>
            
            <div class="col-md-12">
                <div class="col-md-8" style="background-color:white;">
                    <h3 style="float:left"><strong>{{ trans('register.memberinformation') }}</strong></h3>
                    {{--  <img src={{ asset('images/file_upload.png') }} style="float:right;margin-top:6px;" height="45" width="45"/>  --}}
                    <input type="image" src="{{ asset('images/file_upload.png') }}" style="float:right; width:45px; height:45px; margin-top: 6px;" data-toggle="modal" data-target="#myModal"/>
                    <hr class="hrbreakline">

                        <form class="form-horizontal" action="" method="post">
                                <div class="col-md-5">
                                    {{-- Input form section--}}
                                    <div class="form-group row" style="position:relative;">
                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }} :</label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" id="regis_name" name="regis_name" placeholder="{{ trans('register.firstname') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.surname') }} :</label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" id="regis_surname" name="regis_surname" placeholder="{{ trans('register.surname') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.dateofbirth') }} :</label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" id="regis_surname" name="regis_surname" placeholder="demo input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">&nbsp;</div>
                        </form>

                    <!-- 2nd HEADER-->
                    <div class="col-md-12" style="padding-left:0px;">
                        <h3 style="float:left"><strong>{{ trans('register.memberinformation') }}</strong></h3>
                        <hr class="hrbreakline">

                        <form class="form-horizontal" action="" method="post">
                                <div class="col-md-5">
                                    {{-- Input form section--}}
                                    <div class="form-group row" style="position:relative;">
                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.firstname') }} :</label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" id="regis_name" name="regis_name" placeholder="{{ trans('register.firstname') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.surname') }} :</label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" id="regis_surname" name="regis_surname" placeholder="{{ trans('register.surname') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="control-label col-md-4" style="text-align:left;">{{ trans('register.dateofbirth') }} :</label>
                                        <div class="col-md-8">
                                        <input type="text" class="form-control" id="regis_surname" name="regis_surname" placeholder="demo input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">&nbsp;</div>
                        </form>
                    </div>

                </div>

                <div class="col-md-4" style="background-color: #F5F5F5; padding-right:0;">
                    <div class="col-md-12" style="background-color: white;">
                        <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-10" style="background-color:red;">
                                <img src="{{ asset('images/demo.png') }}" class="img-responsive" />
                            </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>

                    <div class="col-md-12" style="background-color: blue;">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-10" style="background-color:green;">
                            <input type="button" class="btn btn-primary btn-block btn-flat" value="HELLOWRLD"/>
                        </div>
                        <div class="col-md-1">&nbsp;</div>
                    </div>
                </div>
            </div>

                <!--*************** MODAL SECTION *************-->
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="modal-title">REGISTER METHOD</h2>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <input type="text" placeholder="Select files"/>
                                    <label class="btn btn-primary">Browse&hellip; <input type="file" style="display: none;" class="form-control"/></label>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!--***************  END MODAL SECTION *************-->

        </div> <!-- -->
    </div>
    
    
@endsection