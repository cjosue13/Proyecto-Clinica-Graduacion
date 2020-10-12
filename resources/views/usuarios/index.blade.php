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
      <a class="btn btn-hover btn-sm black-background" href="{{route('usuarios.show',$value->id)}}">
        <i style="color: #ffffff;" class="fas fa-bars"></i>
      </a>
      <a class="btn btn-hover btn-sm black-background" href="{{route('usuarios.edit',$value->id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $value->id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;"  class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection