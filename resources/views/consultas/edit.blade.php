@extends('layouts.app')
@section('PageTitle', 'Consultas')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexConsulta',$idExp)}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($consulta,['route'=>['updateConsulta',['id'=>$consulta->c_id, 'idExp'=>$idExp]],'method'=>'PATCH']) }}
    @include('consultas.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection