@extends('layouts.app')
@section('PageTitle', 'PersonalSocial')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storePS', $idExp], 'method'=>'POST']) }}
    @include('personalsocial.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection