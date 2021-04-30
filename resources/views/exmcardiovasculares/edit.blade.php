@extends('layouts.app')
@section('PageTitle', 'Exámenes Cardiovasculares')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexECAR',[$exm_id, $idCon, $idExp])}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($exmcardiovasculares,['route'=>['updateECAR',$exmcardiovasculares->car_id, $exm_id, $idCon, $idExp],'method'=>'POST']) }}
    @include('exmcardiovasculares.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection