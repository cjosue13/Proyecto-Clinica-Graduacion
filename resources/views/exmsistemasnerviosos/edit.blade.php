@extends('layouts.app')
@section('PageTitle', 'Exámenes Nerviosos')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($exmsistemasnerviosos,['route'=>['updateESN',$exmsistemasnerviosos->exSn_id, $exm_id],'method'=>'POST']) }}
      @include('exmsistemasnerviosos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection