@extends('layouts.app')
@section('PageTitle', 'Antecedentes')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeQT', $idExp, $Tipo], 'method'=>'POST']) }}
    @include('antQuiruTrau.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection