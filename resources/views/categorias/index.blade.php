@extends('layouts.app')
@section('PageTitle', 'Categorías')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Categorias</h2>
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
      <td>Descripcion</td>
      <th with="140px" class="text-center">
        <a href="{{route('categorias.create')}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </tr>
    <?php $no = 1; ?>
    @foreach ($categorias as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->cgNombre }}</td>
      <td>{{ $value->cgDescripcion }}</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{route('categorias.show',$value->cgID)}}">
          <i class="glyphicon glyphicon-th-large"></i></a>
        <a class="btn btn-primary btn-sm" href="{{route('categorias.edit',$value->cgID)}}">
          <i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['categorias.destroy', $value->cgID],'style'=>'display:inline']) !!}
        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection