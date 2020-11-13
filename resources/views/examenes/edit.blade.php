@extends('layouts.app')
@section('PageTitle', 'Examenes')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($examenes,['route'=>['updateEx',$examenes->exmm_id, $idCon],'method'=>'POST']) }}
      @include('examenes.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection