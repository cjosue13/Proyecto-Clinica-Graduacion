@extends('layouts.app')
@section('PageTitle', 'Experiencias')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Experiencias</h2>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif

  <table class="table table-bordered">
    <tr>
      <th with="80px">No</th>
      <td>Puesto</td>
      <td>Empresa</td>
      <td>Fecha Inicio</td>
      <td>Fecha Final</td>
      <td>Descripción</td>
      <th with="140px" class="text-center">
        <a href="{{route('experiencias.create')}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </tr>
    <?php $no = 1; ?>
    @foreach ($experiencias as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->exPuesto }}</td>
      <td>{{ $value->exEmpresa }}</td>
      <td>{{ $value->exFechaInicio }}</td>
      <td>{{ $value->fechaFinal }}</td>
      <td>{{ $value->exDescripcion }}</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{route('experiencias.show', $value->exID)}}">
          <i class="glyphicon glyphicon-th-large"></i></a>
        <a class="btn btn-primary btn-sm" href="{{route('experiencias.edit', $value->exID)}}">
          <i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['experiencias.destroy', $value->exID ],'style'=>'display:inline']) !!}
        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection