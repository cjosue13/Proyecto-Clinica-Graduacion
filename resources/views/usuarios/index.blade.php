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
  <table class="table table-hover">
    <tr>
      <th with="80px">No</th>
      <th>Nombre Real</th>
      <th>Nombre de Usuario</th>
      <th>Correo</th>
      <!--<td>Contraseña</td>-->
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Tipo de Usuario</th>
      <th>Cédula</th>
      <th>Acciones</th>
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