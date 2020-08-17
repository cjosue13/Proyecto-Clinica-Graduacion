@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Usuario</h2>
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
      <td>Nombre Real</td>
      <td>Nombre de Usuario</td>
      <td>Correo</td>
      <!--<td>Contraseña</td>-->
      <td>Dirección</td>
      <td>Teléfono</td>
      <td>Tipo de Usuario</td>
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
      <!--<td>{{ $value->password }}</td>-->
      <td>{{ $value->address }}</td>
      <td>{{ $value->phone }}</td>
      <td>{{ $value->tipoUsuario }}</td>
      <td><img class="imagen" src="<?php echo ('../../storage/images/' . auth()->user()->photo) ?>"></td>
      <td>{{ $value->cedula }}</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{route('usuarios.show',$value->id)}}">
          <i class="glyphicon glyphicon-th-large"></i></a>
        <a class="btn btn-primary btn-sm" href="{{route('usuarios.edit',$value->id)}}">
          <i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $value->id],'style'=>'display:inline']) !!}
        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection