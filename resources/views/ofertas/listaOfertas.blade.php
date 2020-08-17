@extends('layouts.app')
@section('PageTitle', 'Mis Ofertas')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Ofertas Inscritas</h2>
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
    <td>Nombre</td>
    <td>Ubicacion</td>
    <td>Sueldo</td>
    <td>Descripcion</td>
    <td>Categoria</td>
    <td>Horario</td>
    <td>FechaInicio</td>
    <td>FechaFinal</td>
    <td>Vacantes</td>
    <td>Empresa</td>
    <td>Acciones</td>
  </tr>
  <?php $no = 1; ?>
  @foreach ($array as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->ofNombre }}</td>
    <td>{{ $value->ofUbicacion }}</td>
    <td>{{ $value->ofSueldo }}</td>
    <td>{{ $value->ofDescripcion }}</td>
    <td>{{ $value->ofCategoria  }}</td>
    <td>{{ $value->ofHorario }}</td>
    <td>{{ $value->ofFechaInicio }}</td>
    <td>{{ $value->ofFechaFinal }}</td>
    <td>{{ $value->ofVacantes }}</td>
    <td>{{ $value->ofEmpresa  }}</td>
    <td>
      <a class="btn btn-info btn-sm" href="{{ route('pdf4',$value->ofID) }}">
        <i class="glyphicon glyphicon-th-list"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection