@extends('layouts.app')
@section('PageTitle', 'Enfermedades No Patológicas')
@section('content')
<div class="row">
  <div class="col-sm-12">
  {!! Form::open(['method' => 'POST','route' => ['MenuAntecedentes', $idExp, $paciente[0]->pac_Genero, $paciente[0]->pac_pNombre,$paciente[0]->pac_pApellido, $paciente[0]->pac_id ],'style'=>'display:inline']) !!}
    <button type="submit" class="btn btn-primary float-right" style="margin-right: 15px;">
      <i class="fas fa-arrow-left"></i>
    </button>
  {!! Form::close() !!}
    <div class="full-right">
      <h2>Enfermedades No Patológicas de {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
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

<table class="table table-hover">
  <tr>
    <thead>
      <th width="80px">No</th>
      <th>Enfermedad</th>
      <th>Descripción</th>
      <th width="140px" class="text-center">
        {!! Form::open(['method' => 'GET','route' => ['createNP', $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-success btn-sm">
          <i class="fas fa-plus"></i>
      </button>
      {!! Form::close() !!}
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($antNoPatologicos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	eaNomEnfermedad }}</td>
    <td>{{ $value->	ea_Descripcion }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editNP', $value->ea_id, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteNP', $value->ea_id, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection