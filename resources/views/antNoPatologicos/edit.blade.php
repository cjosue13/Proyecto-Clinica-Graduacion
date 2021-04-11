@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antNoPatologicos,['route'=>['updateNP',$antNoPatologicos->ea_id, $idExp],'method'=>'POST']) }}
      @include('antNoPatologicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection