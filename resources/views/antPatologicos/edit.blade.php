@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antPatologicos,['route'=>['updateP',$antPatologicos->ea_id, $idExp],'method'=>'POST']) }}
      @include('antPatologicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection