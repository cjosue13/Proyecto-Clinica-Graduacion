@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="pull-right">
  <br />
  <a class="btn btn-primary" href="{{ route('formaciones.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'pacientes.store', 'method'=>'POST']) }}
    @include('pacientes.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection