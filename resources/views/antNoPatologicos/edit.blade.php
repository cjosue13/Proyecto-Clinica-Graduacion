@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexNP',$idExp)}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($antNoPatologicos,['route'=>['updateNP',$antNoPatologicos->ea_id, $idExp],'method'=>'POST']) }}
    @include('antNoPatologicos.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection