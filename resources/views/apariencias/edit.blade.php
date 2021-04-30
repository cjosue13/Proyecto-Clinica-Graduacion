@extends('layouts.app')
@section('PageTitle', 'Apariencias')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexAPAR', [$exm_id, $idCon, $idExp])}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($apariencias,['route'=>['updateAPAR',$apariencias->apa_id, $exm_id, $idCon, $idExp],'method'=>'POST']) }}
    @include('apariencias.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection