@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antecedentesginecologicos,['route'=>['antecedentesginecologicos.update',$antecedentesginecologicos->ag_id],'method'=>'PATCH']) }}
      @include('antecedentesginecologicos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection