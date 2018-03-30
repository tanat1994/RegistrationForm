@extends('core')
@section('more_script')
@endsection
@section('content')
<?php use \App\Http\Controllers\dbSyncController; ?>
<?php 
    $classObj = dbSyncController::getClass();
    foreach ($classObj as $key => $value){
        
    }
    //dd(dbSyncController::syncClassToDb());
?>
@endsection