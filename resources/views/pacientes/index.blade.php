@extends('layouts.app')
@section('PageTitle', 'Pacientes')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>pacientes</h2>
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
      <td>P.Nombre</td>
      <td>S.Nombre</td>
      <th with="140px" class="text-center">
        <a href="{{route('pacientes.create')}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </tr>
    <?php $no = 1; ?>
    @foreach ($pacientes as $key => $value)
    <tr>
      <td>{{$no++}}</td>
      <td>{{ $value->pac_pNombre }}</td>
      <td>{{ $value->pac_sNombre }}</td>
      <td>
        <a class="btn btn-info btn-sm" href="{{route('pacientes.show',$value->pac_id)}}">
          <i class="glyphicon glyphicon-th-large"></i></a>
        <a class="btn btn-primary btn-sm" href="{{route('pacientes.edit',$value->pac_id)}}">
          <i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['pacientes.destroy', $value->pac_id],'style'=>'display:inline']) !!}
        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </table>
  @endsection