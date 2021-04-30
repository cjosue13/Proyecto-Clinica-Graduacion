@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('VerAntecedenteGinecologico',$exp_id)}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antecedentesginecologicos,['route'=>['updateAG',$antecedentesginecologicos->ag_id, $exp_id],'method'=>'POST']) }}
      @include('antecedentesginecologicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection