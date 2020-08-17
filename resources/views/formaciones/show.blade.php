@extends('layouts.app')
@section('PageTitle', 'Formaciones')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Formaciones</h2>
        </div>
        <div class="pull-right">
            <br />
            <a class="btn btn-primary" href="{{ route('formaciones.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titulo : </strong>
            {{ $formaciones->foTitulo}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Especialidad : </strong>
            {{ $formaciones->foEspecialidad	}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>foInstitucion : </strong>
            {{ $formaciones->foInstitucion}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha : </strong>
            {{ $formaciones->foFecha}}
        </div>
    </div>
</div>
@endsection