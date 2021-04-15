@extends('layouts.app')
@section('PageTitle', 'Examenes')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeEx', $idCon], 'method'=>'POST']) }}
    @include('examenes.form_master')
    {{ form::close() }}
  </div>
</div>

<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['image.upload.post'], 'method'=>'POST', 'enctype' =>'multipart/form-data']) }}
    <div class="row">
      <div class="col-sm-2">
        {!! form::label('img','Imagen:') !!}
      </div>
      <div class="col-sm-10">
        <div class="form-group">
          {{ Form::File('image', NULL, ['class'=>'form-control', 'name'=>'image', 'id'=>'image']) }}
          {{ Form::button('Subir imagen' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
        </div>
      </div>
    </div>

    {{ form::close() }}


  </div>
</div>



@endsection