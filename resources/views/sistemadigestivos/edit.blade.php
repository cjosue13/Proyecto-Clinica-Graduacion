@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($sistemadigestivos,['route'=>['sistemadigestivos.update',$sistemadigestivos->sd_id],'method'=>'PATCH']) }}
      @include('sistemadigestivos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection