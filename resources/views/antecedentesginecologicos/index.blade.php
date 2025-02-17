@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
<div class="row">
  <div class="col-sm-12">
  <div class="col-sm-12">
  {!! Form::open(['method' => 'POST','route' => ['MenuAntecedentes', $exp_id, $paciente[0]->pac_Genero, $paciente[0]->pac_pNombre,$paciente[0]->pac_pApellido, $paciente[0]->pac_id ],'style'=>'display:inline']) !!}
    <button type="submit" class="btn btn-primary float-right" style="margin-right: 15px;">
      <i class="fas fa-arrow-left"></i>
    </button>
  {!! Form::close() !!}
    <div class="full-right">
      <h2>Antecedentes Ginecologicos de {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
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
  <tr >
    <thead>
    <th width="80px">No</th>
    <th>Primer Ciclo Menstrual</th>
    <th>Edad Primer Ciclo Menstrual</th>
    <th>Cantidad de Ciclos menstruales</th>
    <th>Embarazos</th>
    <th>Partos</th>
    <th>Abortos</th>
    <th>Cesareas</th>
    <th>FUR</th>
    <th>FUPAP</th>
    <th>PF</th>
    <th>PF Detalle</th>
    <th>PRS</th>
    <th>NoCS</th>
    <?php if (sizeof($antecedentesginecologicos) == 0) {?>
      <th width="150px" class="text-center">
        <a href="{{route('create', $expediente[0]->exp_id)}}" class="btn btn-success btn-sm">
          <i class="fas fa-plus"></i>
        </a>
      </th>
    <?php } else { ?>
        <th> </th>
      <?php } ?>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($antecedentesginecologicos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	ag_Menarca }}</td>
    <td>{{ $value->	ag_Edad }}</td>
    <td>{{ $value->	ag_CiclosMenstruales }}</td>
    <td>{{ $value->	ag_Embarazos }}</td>
    <td>{{ $value->	ag_Partos }}</td>
    <td>{{ $value->	ag_Abortos }}</td>
    <td>{{ $value->	ag_Cesareas }}</td>	
    <td>{{ $value->	ag_FUR }}</td>
    <td>{{ $value->	ag_FUPAP }}</td>
    <td>{{ $value->	ag_PF }}</td>
    <td>{{ $value->	ag_PF_detalle }}</td>
    <td>{{ $value->	ag_PRS }}</td>	
    <td>{{ $value->	ag_NoCS }}</td>
    <td width='150px'>
      {!! Form::open(['method' => 'POST','route' => ['edit', $value->ag_id, $value->ag_expediente],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['eliminar', $value->ag_id, $value->ag_expediente],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
      
    </td>
  </tr>
  @endforeach
</table>
@endsection