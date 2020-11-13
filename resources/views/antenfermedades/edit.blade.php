@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($antenfermedades,['route'=>['antenfermedades.update',$antenfermedades->atpnp_id],'method'=>'PATCH']) }}
      @include('antenfermedades.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection