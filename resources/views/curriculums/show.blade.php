@extends('layouts.app')
@section('PageTitle', 'Curriculum')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <br />
            <a class="btn btn-primary" href="{{ route('curriculums.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usuario : </strong>
            {{ $curriculums->crUsuario}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Observaciones : </strong>
            {{ $curriculums->crObservaciones}}
        </div>
    </div>
</div>
@endsection