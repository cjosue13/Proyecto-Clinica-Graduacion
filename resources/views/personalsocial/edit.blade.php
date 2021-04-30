@extends('layouts.app')
@section('PageTitle', 'Personal Social')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('indexPS',$idExp)}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($personalsocial,['route'=>['updatePS',$personalsocial->ps_id, $idExp],'method'=>'POST']) }}
    @include('personalsocial.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection