@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="pull-right">
  <br />
  <a class="btn btn-primary" href="{{ route('sistemadigestivos.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'sistemadigestivos.store', 'method'=>'POST']) }}
    @include('sistemadigestivos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection