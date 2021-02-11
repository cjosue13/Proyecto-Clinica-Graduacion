@extends('layouts.app')
@section('PageTitle', 'Apariencias')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($apariencias,['route'=>['updateAPAR',$apariencias->apa_id, $exm_id],'method'=>'POST']) }}
      @include('apariencias.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection