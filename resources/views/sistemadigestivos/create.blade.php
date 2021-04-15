@extends('layouts.app')
@section('PageTitle', 'Sistema Digestivo')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'sistemadigestivos.store', 'method'=>'POST']) }}
    @include('sistemadigestivos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection