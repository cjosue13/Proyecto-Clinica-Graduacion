@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
<div class="pull-right">
  <br />
  <a class="btn btn-primary" href="{{ route('antecedentesginecologicos.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'antecedentesginecologicos.store', 'method'=>'POST']) }}
    @include('antecedentesginecologicos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection