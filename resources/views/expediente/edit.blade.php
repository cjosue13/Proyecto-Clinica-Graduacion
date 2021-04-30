@extends('layouts.app')
@section('PageTitle', 'Expediente')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-primary" href="{{route('VerExpediente',$id_pac)}}"> <i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::model($expediente,['route'=>['expediente.update',$expediente->exp_id],'method'=>'PATCH']) }}
    @include('expediente.form_master')
    {{ Form::close() }}
  </div>
</div>
@endsection