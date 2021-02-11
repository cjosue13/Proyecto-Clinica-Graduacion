@extends('layouts.app')
@section('PageTitle', 'Exámenes Cardiovasculares')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($exmcardiovasculares,['route'=>['updateECAR',$exmcardiovasculares->car_id, $exm_id],'method'=>'POST']) }}
      @include('exmcardiovasculares.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection