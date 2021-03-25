@extends('layouts.app')
@section('PageTitle', 'Exámenes Cardiovasculares')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($exmsistemasdigestivos,['route'=>['updateEDIS',$exmsistemasdigestivos->exSg_id, $exm_id],'method'=>'POST']) }}
      @include('exmsistemasdigestivos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection