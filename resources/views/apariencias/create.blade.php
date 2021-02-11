@extends('layouts.app')
@section('PageTitle', 'Apariencia')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeAPAR', $exm_id], 'method'=>'POST']) }}
    @include('apariencias.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection