@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeP', $idExp], 'method'=>'POST']) }}
    @include('antPatologicos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection