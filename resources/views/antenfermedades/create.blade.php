@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{ url('antenfermedades') }}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'antenfermedades.store', 'method'=>'POST']) }}
    @include('antenfermedades.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection