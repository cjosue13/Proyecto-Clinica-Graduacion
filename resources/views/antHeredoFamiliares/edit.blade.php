@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antHeredoFamiliares,['route'=>['updateHF',$antHeredoFamiliares->he_id, $idExp],'method'=>'POST']) }}
      @include('antHeredoFamiliares.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection