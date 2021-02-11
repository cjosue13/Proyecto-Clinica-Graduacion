@extends('layouts.app')
@section('PageTitle', 'Examenes CardioVasculares')
@section('content')
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['storeECAR', $exm_id], 'method'=>'POST']) }}
    @include('exmcardiovasculares.form_master')
    {{ form::close() }}
  </div>
</div>
@endsection