@extends('layouts.app')
@section('PageTitle', 'Examenes')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexEx',[$idCon, $idExp])}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['upload-image', $examenes->exmm_id, $idCon, $idExp], 'method'=>'POST', 'enctype' =>'multipart/form-data']) }}
    <div class="row">
      <div class="col-sm-2">
        {!! form::label('img','Imagen:') !!}
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          {{ Form::File('image', ['name'=>'image', 'id'=>'image', 'required' ,'accept'=>'image/*']) }}
          {{ Form::button('Subir imagen' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
        </div>
      </div>
    </div>
    {{ form::close() }}
  </div>
</div>
  <div class="row justify-content-center">
    <div class="col-md-6 col-md-offset-3">
    
      {{ Form::model($examenes,['route'=>['updateEx',$examenes->exmm_id, $idCon, $idExp],'method'=>'POST']) }}
      @include('examenes.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection