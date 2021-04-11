@extends('layouts.app')
@section('PageTitle', 'Expediente')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($expediente,['route'=>['expediente.update',$expediente->exp_id],'method'=>'PATCH']) }}
      @include('expediente.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection