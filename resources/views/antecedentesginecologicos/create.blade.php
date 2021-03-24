@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
<div class="justify-content-right">
  <br />
  <a class="btn btn-primary" href="{{ route('antecedentesginecologicos.index') }}"> <i class="fas fa-arrow-left"></i></a>
</div>
<div class="row justify-content-md-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeAG', $idExp], 'method'=>'POST']) }}
    @include('antecedentesginecologicos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection