@extends('layouts.app')
@section('PageTitle', 'Requisitos')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($requisitos,['route'=>['update',$requisitos->rqID, $rqOfertaTrabajo],'method'=>'PATCH']) }}
      @include('requisitos.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection