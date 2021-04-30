@extends('layouts.app')
@section('PageTitle', 'Consultas')
@section('content')
<div class="row">
  <div class="col-sm-12">
  {!! Form::open(['method' => 'POST','route' => ['MenuAntecedentes', $expediente[0]->exp_id, $paciente[0]->pac_Genero, $paciente[0]->pac_pNombre,$paciente[0]->pac_pApellido, $paciente[0]->pac_id ],'style'=>'display:inline']) !!}
    <button type="submit" class="btn btn-primary float-right" style="margin-right: 15px;">
      <i class="fas fa-arrow-left"></i>
    </button>
  {!! Form::close() !!}
    <div class="full-right">
      <h2> Expediente de {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
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

@isset($consulta)

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Deseas generar un pdf con la consulta?</p>
      </div>
      <div class="modal-footer">
        {!! Form::open(['method' => 'GET','route' => ['consultaPDF',$consulta->c_id],'style'=>'display:inline']) !!}
        <button type="submit" class="btn btn-primary">Descargar PDF</button>
        {!! Form::close() !!}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endisset


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
          <i class="fas fa-plus"></i>
        </a>
      </th>
    </thead>
  </tr>
  @foreach ($consultas as $key => $value)
  <tr>

    <?php if ($value->c_tipo == "P") { ?>
      <td>Psiquico</td>
    <?php } else if ($value->c_tipo == "G") { ?>
      <td>General</td>
    <?php } else if ($value->c_tipo == "F") { ?>
      <td>Físico</td>
    <?php }  ?>
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
      <a class="btn btn-hover btn-sm black-background" href="{{route('consultaPDF',$value->c_id)}}">
        <i style="color: #ffffff;">PDF</i>
      </a>
      {!! Form::open(['method' => 'GET','route' => ['indexEx',$value->c_id, $expediente[0]->exp_id],'style'=>'display:inline-block; margin-top:10px;']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Examenes</i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'GET','route' => ['indexEC', $value->c_id, $expediente[0]->exp_id],'style'=>'display:inline-block; margin-top:10px;']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Examenes Clinicos</i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>

<!--script para javascript para que carga el modal -->

@isset($consulta)
<script>
  $(function() {
    $('#modal').modal({
      backdrop: 'static',
      keyboard: false,
      focus: false,

    });
  });
</script>
@endisset


@endsection