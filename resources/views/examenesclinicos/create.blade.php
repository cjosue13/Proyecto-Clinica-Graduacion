@extends('layouts.app')
@section('PageTitle', 'Examenes Clinicos')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeEC', $idCon], 'method'=>'POST']) }}
    @include('examenesclinicos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection