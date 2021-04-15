@extends('layouts.app')
@section('PageTitle', 'Sistema Nervioso')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'sistemanerviosos.store', 'method'=>'POST']) }}
    @include('sistemanerviosos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection