@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexP',$idExp)}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($antPatologicos,['route'=>['updateP',$antPatologicos->ea_id, $idExp],'method'=>'POST']) }}
    @include('antPatologicos.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection