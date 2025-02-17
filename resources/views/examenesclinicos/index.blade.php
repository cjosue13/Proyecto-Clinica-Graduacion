@extends('layouts.app')
@section('PageTitle', 'Examenes Clinicos')
@section('content')
<div class="row">
  <div class="col-sm-12">
    {!! Form::open(['method' => 'GET','route' => ['indexConsulta', $idExp],'style'=>'display:inline']) !!}
    <button type="submit" class="btn btn-primary float-right" style="margin-right: 15px;">
      <i class="fas fa-arrow-left"></i>
    </button>
    {!! Form::close() !!}
    <div class="full-right">
      <h2>Examenes Clínicos</h2>
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
      <th with="80px">No</th>
      <th>Peso(kg)</th>
      <th>Estatura(cm)</th>
      <th>IMC</th>
      <th>Frecuencia Cardiaca(lat/mm)</th>
      <th>Temperatura(°C)</th>
      <th>Sistólica</th>
      <th>Diastólica</th>
      <?php if (sizeof($examenesclinicos) == 0) { ?>
        <th width="140px" class="text-center">
          <a href="{{route('createEC', [$idCon, $idExp])}}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i>
          </a>
        </th>
      <?php } else { ?>
        <th> </th>
      <?php } ?>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($examenesclinicos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->exm_peso }}</td>
    <td>{{ $value->exm_altura }}</td>
    <td>{{ $value->exm_imc }}</td>
    <td>{{ $value->exm_FC }}</td>
    <td>{{ $value->exm_Temperatura }}</td>
    <td>{{ $value->exm_sistolica }}</td>
    <td>{{ $value->exm_diastolica }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editEC', $value->exm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteEC', $value->exm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'GET','route' => ['indexECAR',$value->exm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Exámenes Cardiovasculares</i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'GET','route' => ['indexEDIS',$value->exm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Exámenes Digestivos</i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'GET','route' => ['indexESN',$value->exm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Exámenes Nerviosos</i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'GET','route' => ['indexAPAR',$value->exm_id, $idCon, $idExp],'style'=>'display:inline-block; margin-top:5px;']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Apariencia</i>
      </button>
      {!! Form::close() !!}

    </td>
  </tr>
  @endforeach
</table>
@endsection