@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{ url('usuarios') }}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($usuarios,['route'=>['usuarios.update',$usuarios->id],'method'=>'PATCH']) }}
    @include('usuarios.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection