@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($pacientes,['route'=>['pacientes.update',$pacientes->pac_id],'method'=>'PATCH']) }}
      @include('pacientes.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection