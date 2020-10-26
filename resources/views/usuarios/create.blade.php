@extends('layouts.app')
@section('PageTitle', 'Usuarios')
@section('content')
<div class="pull-right">
  <br />
  <a class="btn btn-primary" href="{{ route('expediente.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'usuarios.store', 'method'=>'POST']) }}
    @include('usuarios.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection