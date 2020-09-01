@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Mostrar Pacientes</h2>
        </div>
        <div class="pull-right">
            <br/>
            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>P.Nombre: </strong>
            {{ $pacientes->pac_pNombre}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>S.Nombre: </strong>
            {{ $pacientes->pac_sNombre}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>P.Apellido: </strong>
            {{ $pacientes->pac_pApellido}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>S.Apellido: </strong>
            {{ $pacientes->pac_pApellido}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edad: </strong>
            {{ $pacientes->pac_Edad}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edad: </strong>
            {{ $pacientes->pac_Cedula}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edad: </strong>
            {{ $pacientes->pac_Genero}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edad: </strong>
            {{ $pacientes->pac_FechaNacimiento}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edad: </strong>
            {{ $pacientes->pac_Residencia}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Edad: </strong>
            {{ $pacientes->pac_Correo}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Profesion/Oficio: </strong>
            {{ $pacientes->pac_Profesion_Oficio}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estado Civil: </strong>
            {{ $pacientes->pac_EstadoCivil}}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Religión: </strong>
            {{ $pacientes->pac_Religion}}
        </div>
    </div>
</div>

@endsection