@extends('layouts.app')
@section('PageTitle', 'Exámenes Nerviosos')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexESN',[$exm_id, $idCon, $idExp])}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($exmsistemasnerviosos,['route'=>['updateESN',$exmsistemasnerviosos->exSn_id, $exm_id, $idCon, $idExp],'method'=>'POST']) }}
    @include('exmsistemasnerviosos.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection