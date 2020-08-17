@extends('layouts.app')
@section('PageTitle', 'Experiencias')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Experiencia</h2>
        </div>
        <div class="pull-right">
            <br />
            <a class="btn btn-primary" href="{{ route('experiencias.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Puesto : </strong>
            {{ $experiencias->exPuesto}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Empresa : </strong>
            {{ $experiencias->exEmpresa	}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha Inicio : </strong>
            {{ $experiencias->exFechaInicio}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fecha Final : </strong>
            {{ $experiencias->fechaFinal}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion : </strong>
            {{ $experiencias->exDescripcion}}
        </div>
    </div>
</div>
@endsection