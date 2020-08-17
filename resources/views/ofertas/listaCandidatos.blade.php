@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>{{$ofertas->ofNombre}}</h2>
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
      <td>Dirección</td>
      <td>Teléfono</td>
      <td>Foto</td>
      <td>Cédula</td>
      <td>Acciones</td>
    </tr>
    <?php $no = 1; ?>
    @foreach ($array as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->name }}</td>
      <td>{{ $value->username }}</td>
      <td>{{ $value->email }}</td>
      <td>{{ $value->address }}</td>
      <td>{{ $value->phone }}</td>
      <td>{{ $value->photo }}</td>
      <td>{{ $value->cedula }}</td>
      <td>
      <a class="btn btn-info btn-sm" href="{{ route('pdf',$value->id) }}">
        <i class="glyphicon glyphicon-th-list"></i></a>
      </td>
    </tr>
    @endforeach
  </table>
  @endsection