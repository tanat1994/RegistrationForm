@extends('core')
@section('more_script')

@endsection
@section('content')


@foreach ($visitorLists["data"] as $result)
    <img src="{{ $result['regis_img_camera'] }}"/>
@endforeach