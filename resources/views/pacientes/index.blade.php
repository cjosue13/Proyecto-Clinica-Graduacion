@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')

<div class="row">
  <div class="col-sm-12">
    <div class="col-lg-12">
      <a class="btn btn-primary float-right" href="{{ url('/home') }}"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="full-right">
      <h2>Pacientes</h2>
    </div>
  </div>
</div>

<div class="row justify-content-md-left">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open(['route'=>['filtro'], 'method'=>'GET']) }}
    <div class="row">
      <div class="col-sm-10">
        <div class="input-group">
          {{Form::text('txt_nombre',NULL,['type'=>'submit','class'=>'form-control form-control-user', 'placeholder'=> 'Nombre/Cédula del paciente'])}}
          {{ Form::button('Buscar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
        </div>
      </div>
    </div>
    {{ form::close() }}
  </div>
</div>
<br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('warning'))
<div class="alert alert-warning">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-hover">
  <tr>
    <thead>
      <th width="80px">No</th>
      <th>Nombre Completo</th>
      <th>Cedula</th>
      <th>Genero</th>
      <th>Fecha de Nacimiento</th>
      <th>Residencia</th>
      <th>Correo</th>
      <th>Profesión/Oficio</th>
      <th>Estado Civil</th>
      <th>Religión</th>
      <th width="140px" class="text-center">
        <a href="{{route('pacientes.create')}}" class="btn btn-success btn-sm">
          <i class="fas fa-plus"></i>
        </a>
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($pacientes as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td width='150px'>
      {{ $value->pac_pNombre . " " . $value->pac_sNombre . " " . $value->pac_pApellido . " " . $value->	pac_sApellido }}
    </td>
    <td>{{ $value->	pac_Cedula }}</td>
    <td>{{ $value->	pac_Genero }}</td>
    <td>{{ $value->	pac_FechaNacimiento }}</td>
    <td>{{ $value->	pac_Residencia }}</td>
    <td>{{ $value->	pac_Correo }}</td>
    <td>{{ $value->	pac_Profesion_Oficio }}</td>
    <?php if ($value->pac_EstadoCivil == "ST") { ?>
      <td>Soltero</td>
    <?php } else if ($value->pac_EstadoCivil == "CO") { ?>
      <td>Comprometido</td>
    <?php } else if ($value->pac_EstadoCivil == "ER") { ?>
      <td>En una relación</td>
    <?php } else if ($value->pac_EstadoCivil == "CA") { ?>
      <td>Casado</td>
    <?php } else if ($value->pac_EstadoCivil == "UL") { ?>
      <td>Unión Libre</td>
    <?php } else if ($value->pac_EstadoCivil == "SP") { ?>
      <td>Separado</td>
    <?php } else if ($value->pac_EstadoCivil == "DV") { ?>
      <td>Divorciado</td>
    <?php } else if ($value->pac_EstadoCivil == "VD") { ?>
      <td>Viudo/Viuda</td>
    <?php } ?>
    <td>{{ $value->	pac_Religion }}</td>
    <td>

      <a class="btn btn-hover btn-sm black-background" href="{{route('pacientes.edit',$value->pac_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['pacientes.destroy',
      $value->pac_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
      <a class="btn btn-hover btn-sm black-background" href="{{route('pacientePDF',$value->pac_id)}}">
        <i style="color: #ffffff;">PDF</i>
      </a>
      <a class="btn btn-info btn-sm btn-block" style="margin-top: 5px;" href="{{route('VerExpediente',$value->pac_id)}}">
        <i class=""></i>Expediente</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection