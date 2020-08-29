@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Pacientes</h2>
    </div>
  </div>
</div>

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

<table class="table table-bordered">
  <tr >
    <th width="80px">No</th>
    <td>Nombre Completo</td>
    <td>Cedula</td>
    <td>Genero</td>
    <td>Fecha de Nacimiento</td>
    <td>Residencia</td>
    <td>Correo</td>
    <td>Profesion/Oficio</td>
    <td>Estado Civil</td>
    <td>Religión</td>
    <th width="140px" class="text-center">
      <a href="{{route('pacientes.create')}}" class="btn btn-success btn-sm">
        <i class="glyphicon glyphicon-plus"></i>
      </a>
    </th>
  </tr>
  <?php $no = 1; ?>
  @foreach ($pacientes as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td width = '150px' >{{ $value->pac_pNombre . " " . $value->pac_sNombre . " " . $value->pac_pApellido . " " . $value->	pac_sApellido }}</td>
    <td>{{ $value->	pac_Cedula }}</td>
    <td>{{ $value->	pac_Genero }}</td>
    <td>{{ $value->	pac_FechaNacimiento }}</td>
    <td>{{ $value->	pac_Residencia }}</td>
    <td>{{ $value->	pac_Correo }}</td>
    <td>{{ $value->	pac_Profesion_Oficio }}</td>	
    <td>{{ $value->	pac_EstadoCivil }}</td>
    <td>{{ $value->	pac_Religion }}</td>
    <td>
      <a class="btn btn-info btn-sm" href="{{route('pacientes.show',$value->pac_id)}}">
        <i class="glyphicon glyphicon-th-large"></i></a>
      <a class="btn btn-primary btn-sm" href="{{route('pacientes.edit',$value->pac_id)}}">
        <i class="glyphicon glyphicon-pencil"></i></a>
      {!! Form::open(['method' => 'DELETE','route' => ['pacientes.destroy', $value->pac_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection