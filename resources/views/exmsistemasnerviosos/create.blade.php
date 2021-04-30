@extends('layouts.app')
@section('PageTitle', 'Examenes nerviosos')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexESN',[$exm_id, $idCon, $idExp])}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeESN', $exm_id, $idCon, $idExp], 'method'=>'POST']) }}
    @include('exmsistemasnerviosos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection