@extends('layouts.app')
@section('PageTitle', 'Requisitos')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Requisitos</h2>
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
      <td>Descripción</td>
      <th with="140px" class="text-center">
        <a href="{{route('create',$rqOfertaTrabajo)}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </tr>
    <?php $no = 1; ?>
    @foreach ($requisitos as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->rqNombre }}</td>
      <td>{{ $value->rqDescripcion }}</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{ route('show', ['id'=>$value->rqID,'oferta'=>$rqOfertaTrabajo] ) }}">
          <i class="glyphicon glyphicon-th-large"></i></a>
        <a class="btn btn-primary btn-sm" href="{{route('edit', ['id'=>$value->rqID,'oferta'=>$rqOfertaTrabajo])}}">
          <i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['destroy', $value->rqID, $rqOfertaTrabajo],'style'=>'display:inline']) !!}
        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection