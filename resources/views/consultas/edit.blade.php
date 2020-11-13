@extends('layouts.app')
@section('PageTitle', 'Consultas')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($consulta,['route'=>['updateConsulta',['id'=>$consulta->c_id, 'idExp'=>$idExp]],'method'=>'PATCH']) }}
      @include('consultas.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection