@extends('layouts.app')
@section('PageTitle', 'Ofertas')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($ofertas,['route'=>['ofertas.update',$ofertas->ofID],'method'=>'PATCH']) }}
      @include('ofertas.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection