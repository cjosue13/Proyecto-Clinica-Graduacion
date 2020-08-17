@extends('layouts.app')
@section('PageTitle', 'Ofertas')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Ofertas</h2>
    </div>
    <br>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group" style="display: flex;">
        {{ Form::open(['route'=>['filter'], 'method'=>'GET']) }}        
        <input name="txt_empresa" class="form-control" style="width: 100%;" type="text" placeholder="Empresa">
        <button type="submit" style="margin-left: 10px; margin-right: auto; justify-content: center;" class="btn btn-info btn-sm" style="font-size: 20px;" class="fa fa-floppy-o">Buscar</i></button>
        {{ form::close() }}
        {{ Form::open(['route'=>['filter'], 'method'=>'GET']) }}        
        <input name="txt_categoria" class="form-control" style="width: 100%;" type="text" placeholder="Categoria">
        <button type="submit" style="margin-left: 10px; margin-right: auto; justify-content: center;" class="btn btn-info btn-sm" style="font-size: 20px;" class="fa fa-floppy-o">Buscar</i></button>
        {{ form::close() }}
      </div>
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
  <tr>
    <th with="80px">No</th>
    <td>Nombre de Oferta</td>
    <td>Empresa</td>
    <td>Categoría</td>
    <td>Descripción</td>
    <td>Fecha Inicio</td>
    <td>Fecha Final</td>
    <td>Ubicación</td>
    <td>Horario</td>
    <td>Vacantes</td>
    <td>Sueldo</td>
    @if ($tipoUsuario == 'E')
    <th with="140px" class="text-center">
      <a href="{{route('ofertas.create')}}" class="btn btn-success btn-sm">
        <i class="glyphicon glyphicon-plus"></i>
      </a>
    </th>
    @else
    <th with="140px" class="text-center">
      <a>Acciones</a>
    </th>
    @endif
  </tr>
  <?php $no = 1; ?>
  @foreach ($ofertas as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->ofNombre }}</td>
    <td>{{ $value->ofEmpresa }}</td>
    <td>{{ $value->ofNomCategoria }}</td>
    <td>{{ $value->ofDescripcion }}</td>
    <td>{{ $value->ofFechaInicio }}</td>
    <td>{{ $value->ofFechaFinal }}</td>
    <td>{{ $value->ofUbicacion }}</td>
    <td>{{ $value->ofHorario }}</td>
    <td>{{ $value->ofVacantes }}</td>
    <td>{{ $value->ofSueldo }}</td>
    <td>
      @if ($tipoUsuario == 'E')
      <a class="btn btn-primary btn-sm" href="{{route('listaCandidatos',$value->ofID)}}">
        <i class="glyphicon glyphicon-th-list"></i></a>
      <a class="btn btn-info btn-sm" href="{{route('offer',$value->ofID)}}">
        Requisitos</a>
      <a class="btn btn-primary btn-sm" href="{{route('ofertas.edit',$value->ofID)}}">
        <i class="glyphicon glyphicon-pencil"></i></a>
      {!! Form::open(['method' => 'DELETE','route' => ['ofertas.destroy', $value->ofID],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
      {!! Form::close() !!}
      @else
      {{ Form::open(['route'=>['inscribir', 'ofID'=>$value->ofID], 'method'=>'POST']) }}
      <button type="submit" style="margin-left: auto; margin-right: auto; justify-content: center;" class="btn btn-info btn-sm" style="font-size: 20px;" class="fa fa-floppy-o">Inscribirse</i></button>
      {{ form::close() }}
      @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection