@extends('layouts.app')
@section('PageTitle', 'Examenes Digestivos')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeEDIS', $exm_id], 'method'=>'POST']) }}
    @include('exmsistemasdigestivos.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection