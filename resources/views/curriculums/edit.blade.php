@extends('layouts.app')
@section('PageTitle', 'Curriculum')
@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($curriculums,['route'=>['curriculums.update',$curriculums->crID],'method'=>'PATCH']) }}
      @include('curriculums.form_master')
      {{ Form::close() }}
    </div>
  </div>
@endsection