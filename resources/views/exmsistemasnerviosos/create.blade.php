@extends('layouts.app')
@section('PageTitle', 'Examenes nerviosos')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeESN', $exm_id], 'method'=>'POST']) }}
    @include('exmsistemasnerviosos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection