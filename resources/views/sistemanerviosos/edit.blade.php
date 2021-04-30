@extends('layouts.app')
@section('PageTitle', 'Sistema Nervioso')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{ url('sistemanerviosos') }}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($sistemanerviosos,['route'=>['sistemanerviosos.update',$sistemanerviosos->snc_id],'method'=>'PATCH']) }}
    @include('sistemanerviosos.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection