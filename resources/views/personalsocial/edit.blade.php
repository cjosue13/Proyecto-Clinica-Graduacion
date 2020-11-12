@extends('layouts.app')
@section('PageTitle', 'Personal Social')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($personalsocial,['route'=>['updatePS',$personalsocial->ps_id, $idExp],'method'=>'POST']) }}
      @include('personalsocial.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection