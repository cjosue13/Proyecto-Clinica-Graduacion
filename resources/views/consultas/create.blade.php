@extends('layouts.app')
@section('PageTitle', 'Expediente')
@section('content')
<div class="justify-content-right">
  <br/>
  <a class="btn btn-primary" href="{{ route('indexConsulta', $idExp) }}"> <i class="fas fa-arrow-left"></i></a>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeConsulta', $idExp], 'method'=>'POST']) }}
    @include('consultas.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection