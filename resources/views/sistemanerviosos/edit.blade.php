@extends('layouts.app')
@section('PageTitle', 'Sistema Nervioso')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($sistemanerviosos,['route'=>['sistemanerviosos.update',$sistemanerviosos->snc_id],'method'=>'PATCH']) }}
      @include('sistemanerviosos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection