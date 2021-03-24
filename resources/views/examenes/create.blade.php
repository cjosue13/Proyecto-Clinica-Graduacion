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
@endsection