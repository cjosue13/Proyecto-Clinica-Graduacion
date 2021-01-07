@extends('layouts.app')
@section('PageTitle', 'Expedientes')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
    <h2> Expediente de  {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
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
      <th>Tipo</th>
      <th>Motivo</th>
      <th>Diagnóstico</th>
      <th>Problemas</th>
      <th>Historia de padecimiento</th>
      <th>Indicaciones</th>
      <th>Recomendaciones</th>
      <th>Hora</th>
      <th>Fecha</th>
      <th>Acompañante</th>
      <th width="140px" class="text-center">
        <a href="{{route('createConsulta', $expediente[0]->exp_id)}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </thead>
  </tr>
  @foreach ($consultas as $key => $value)
  <tr>
    
    <td>{{ $value->c_tipo }}</td>
    <td>{{ $value->c_motivo }}</td>
    <td>{{ $value->c_Diagnostico }}</td>
    <td>{{ $value->c_Problemas }}</td>
    <td>{{ $value->c_HistoriaPadecimientoAct }}</td>
    <td>{{ $value->c_indicaciones }}</td>
    <td>{{ $value->c_recomendaciones }}</td>
    <td>{{ $value->c_Hora }}</td>
    <td>{{ $value->c_Fecha }}</td>
    <td>{{ $value->c_Acompanante }}</td>
    <td>
      
      <a class="btn btn-hover btn-sm black-background" href="{{route('editConsulta', ['id'=>$value->c_id, 'idExp'=>$expediente[0]->exp_id])}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['deleteConsulta', $value->c_id, $expediente[0]->exp_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'POST','route' => ['indexEx',$value->c_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Examenes</i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'POST','route' => ['indexEC',$value->c_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Examenes Clinicos</i>
      </button>
      {!! Form::close() !!}-->


    </td>
  </tr>
  @endforeach
</table>
@endsection