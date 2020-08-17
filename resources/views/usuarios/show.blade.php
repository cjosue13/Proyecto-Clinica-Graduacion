@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <br/>
            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre Real : </strong>
            {{ $usuarios->name}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre de Usuario : </strong>
            {{ $usuarios->username}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Correo : </strong>
            {{ $usuarios->email}}
        </div>
    </div>
    <!--<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contraseña : </strong>
            {{ $usuarios->password}}
        </div>
    </div>-->
    
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Dirección : </strong>
            {{ $usuarios->address}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefono : </strong>
            {{ $usuarios->phone}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo de Usuario : </strong>
            {{ $usuarios->tipoUsuario}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Foto : </strong>
            {{ $usuarios->photo}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cédula : </strong>
            {{ $usuarios->cedula}}
        </div>
    </div>
</div>
@endsection