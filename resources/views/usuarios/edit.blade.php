@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($usuarios,['route'=>['usuarios.update',$usuarios->id],'method'=>'PATCH']) }}
    @include('usuarios.form_master')
    {{ Form::close() }}
    <form method="POST" action="/upload" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-sm-2">
          <!--<input id="photo" type="photo" placeholder="Foto" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo">-->
          {!! form::label('username','Cambiar Foto') !!}
        </div>
        <div class="col-sm-10">
          <img class="imagen" src="<?php echo ('../../storage/images/' . auth()->user()->photo) ?>">
          <input type="file" type="photo" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo">
          @error('photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-success">
            {{ __('cargar') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection