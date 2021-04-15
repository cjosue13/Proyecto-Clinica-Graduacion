@extends('layouts.app')
@section('PageTitle', 'Usuarios')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'usuarios.store', 'method'=>'POST']) }}
    @include('usuarios.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection