@extends('layouts.app')
@section('PageTitle', 'Formaciones')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Formaciones</h2>
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
      <td>Titulo</td>
      <td>Especialidad</td>
      <td>Institucion</td>
      <td>Fecha</td>
      <th with="140px" class="text-center">
        <a href="{{route('formaciones.create')}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </tr>
    <?php $no = 1; ?>
    @foreach ($formaciones as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->foTitulo}}</td>
      <td>{{ $value->foEspecialidad}}</td>
      <td>{{ $value->foInstitucion}}</td>
      <td>{{ $value->foFecha }}</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{route('formaciones.show',$value->foID)}}">
          <i class="glyphicon glyphicon-th-large"></i></a>
        <a class="btn btn-primary btn-sm" href="{{route('formaciones.edit',$value->foID)}}">
          <i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['formaciones.destroy', $value->foID],'style'=>'display:inline']) !!}
        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection