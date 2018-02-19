@extends('core')
@section('more_script')
    <link type="text/css" rel="stylesheet" href="{{asset('css/loadingstyle.css')}}"/>
@endsection

@section('body_function')
    onload="loadingFunction();"
@endsection

@section('content')
<ul class="loadingStyle" id="myLoadingScreen">
    <li>L</li>
    <li>O</li>
    <li>A</li>
    <li>D</li>
    <li>I</li>
    <li>N</li>
    <li>G</li>
    <li>.</li>
    <li>.</li>
    <li>.</li>
</ul>

@endsection


<script>
    var myVar;
    function loadingFunction() {
        myVar = setTimeout(showPage, 2000);
    }

    function showPage() {
        //document.getElementById("myLoadingScreen").style.display = "none";
        $('#myLoadingScreen').fadeOut(300);
        document.getElementById("myTable").style.display = "block";
        document.body.style.backgroundColor = "#F5F5F5";
    }
</script>