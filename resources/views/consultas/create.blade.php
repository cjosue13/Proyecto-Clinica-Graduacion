@extends('layouts.app')
@section('PageTitle', 'Expediente')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeConsulta', $idExp], 'method'=>'POST']) }}
    @include('consultas.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection