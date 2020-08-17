@extends('layouts.app')
@section('PageTitle', 'Empresas')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Empresa</h2>
    </div>
  </div>
</div>

@if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
  {{ Form::open(['route'=>['filtro'], 'method'=>'GET']) }}        
    <input name="txt_empresa" class="form-control" style="margin-left: 5px; width: 30%;" type="text" placeholder="Nombre">
    <button type="submit" style="margin-left: 10px; margin: 5px; justify-content: center;" class="btn btn-info btn-sm" style="font-size: 20px;" class="fa fa-floppy-o">Buscar</i></button>
  {{ form::close() }}
  <table class="table table-bordered">
    <tr>
      <th with="80px">No</th>
      <td>Nombre Real</td>
      <td>Nombre de Usuario</td>
      <td>Correo</td>
      <td>Dirección</td>
      <td>Teléfono</td>
      <td>Foto</td>
      <td>Cédula</td>
      <td>Acciones</td>
    </tr>
    <?php $no = 1; ?>
    @foreach ($usuarios as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->name }}</td>
      <td>{{ $value->username }}</td>
      <td>{{ $value->email }}</td>
      <td>{{ $value->address }}</td>
      <td>{{ $value->phone }}</td>
      <td><img class="imagen" style="width:50px; height:50px;" src="<?php echo ('../storage/images/' . $value->photo) ?>"></td>
      <td>{{ $value->cedula }}</td>
      <td>
      <a class="btn btn-info btn-sm" href="{{ route('pdf3',$value->id) }}">
        <i class="glyphicon glyphicon-th-list"></i></a>
      </td>
    </tr>
    @endforeach
  </table>
  @endsection