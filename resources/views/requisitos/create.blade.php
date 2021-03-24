@extends('layouts.app')
@section('PageTitle', 'Requisitos')
@section('content')
  <div class="row justify-content-md-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::open(['route'=>['store', 'oferta'=>$rqOfertaTrabajo], 'method'=>'POST']) }}
        @include('requisitos.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection