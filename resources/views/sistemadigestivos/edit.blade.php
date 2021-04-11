@extends('layouts.app')
@section('PageTitle', 'Sistema Digestivo')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($sistemadigestivos,['route'=>['sistemadigestivos.update',$sistemadigestivos->sd_id],'method'=>'PATCH']) }}
      @include('sistemadigestivos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection