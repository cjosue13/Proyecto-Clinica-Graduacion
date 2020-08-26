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
            <strong>Nombre: </strong>
            {{ $pacientes->pac_pNombre}}
        </div>
    </div>
</div>
@endsection