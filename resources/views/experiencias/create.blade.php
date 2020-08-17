@extends('layouts.app')
@section('PageTitle', 'Experiencias')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::open(['route'=>'experiencias.store', 'method'=>'POST']) }}
        @include('experiencias.form_master')
      {{ form::close() }}
    </div>
  </div>
@endsection