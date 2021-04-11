@extends('layouts.app')
@section('PageTitle', 'Edición de Antecedentes')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antecedentes,['route'=>['updateQT', $antecedentes->atqt_id, $idExp, $tipo],'method'=>'POST']) }}
      @include('antQuiruTrau.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection