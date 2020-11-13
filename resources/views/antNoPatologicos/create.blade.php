@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="pull-right">
  <br />
  <a class="btn btn-primary" href="{{ route('antNoPatologicos.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>'antNoPatologicos.store', 'method'=>'POST']) }}
    @include('antNoPatologicos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection