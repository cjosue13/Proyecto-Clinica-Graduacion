@extends('layouts.app')
@section('PageTitle', 'Formaciones')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($formaciones,['route'=>['formaciones.update',$formaciones->foID],'method'=>'PATCH']) }}
      @include('formaciones.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection