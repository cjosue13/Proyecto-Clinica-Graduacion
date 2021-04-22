@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antecedentesginecologicos,['route'=>['updateAG',$antecedentesginecologicos->ag_id, $exp_id],'method'=>'POST']) }}
      @include('antecedentesginecologicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection