@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="justify-content-right">
  <br />
  <a class="btn btn-primary" href="{{ route('antNoPatologicos.index') }}"> <i class="fas fa-arrow-left"></i></a>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeNP', $idExp], 'method'=>'POST']) }}
    @include('antNoPatologicos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection