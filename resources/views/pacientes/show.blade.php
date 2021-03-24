@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Expediente</h2>
        </div>
        <div class="pull-right">
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary" href="{{route('pacientePDF',$pacientes->pac_id)}}">Export to PDF</a>
            </div>
           
            <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>

    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Nombre Completo : </strong>
        {{ $pacientes->pac_pNombre . " " . $pacientes->pac_sNombre . " " . $pacientes->pac_pApellido . " " . $pacientes->	pac_sApellido}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Cedula : </strong>
        {{ $pacientes->pac_Cedula }}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Genero : </strong>
        {{ $pacientes->pac_Genero}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Fecha de Nacimiento : </strong>
        {{ $pacientes->pac_FechaNacimiento}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Residencia : </strong>
        {{ $pacientes->pac_Residencia}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Correo : </strong>
        {{ $pacientes->pac_Correo }}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Profesion : </strong>
        {{ $pacientes->pac_Profesion_Oficio}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Estado Civil : </strong>
        <?php if ($pacientes->pac_EstadoCivil == "ST") { ?>
            Soltero
        <?php } else if ($pacientes->pac_EstadoCivil == "CO") { ?>
            Comprometido
        <?php } else if ($pacientes->pac_EstadoCivil == "ER") { ?>
            En una relación
        <?php } else if ($pacientes->pac_EstadoCivil == "CA") { ?>
            Casado
        <?php } else if ($pacientes->pac_EstadoCivil == "UL") { ?>
            Unión Libre
        <?php } else if ($pacientes->pac_EstadoCivil == "SP") { ?>
            Separado
        <?php } else if ($pacientes->pac_EstadoCivil == "DV") { ?>
            Divorciado
        <?php } else if ($pacientes->pac_EstadoCivil == "VD") { ?>
            Viudo/Viuda
        <?php } ?>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Religion : </strong>
        {{ $pacientes->pac_Religion}}
    </div>
</div>

@endsection