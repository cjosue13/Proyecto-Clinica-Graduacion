@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antNoPatologicos,['route'=>['antNoPatologicos.update',$antNoPatologicos->ea_id],'method'=>'PATCH']) }}
      @include('antNoPatologicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection