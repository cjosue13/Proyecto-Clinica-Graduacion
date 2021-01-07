@extends('layouts.app')
@section('PageTitle', 'Examenes Clinicos')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($examenesclinicos,['route'=>['updateEC',$examenesclinicos->exm_id, $idCon],'method'=>'POST']) }}
      @include('examenesclinicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection