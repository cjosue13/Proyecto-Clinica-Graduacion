@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($usuarios,['route'=>['usuarios.update',$usuarios->id],'method'=>'PATCH']) }}
    @include('usuarios.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection