@extends('layouts.app')
@section('PageTitle', 'Examenes')
@section('content')
<div class="row">
  <div class="col-sm-12">
    {!! Form::open(['method' => 'GET','route' => ['indexConsulta', $idExp],'style'=>'display:inline']) !!}
    <button type="submit" class="btn btn-primary float-right" style="margin-right: 15px;">
      <i class="fas fa-arrow-left"></i>
    </button>
    {!! Form::close() !!}
    <div class="full-right">
      <h2>Examenes</h2>
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

<table class="table table-hover">
  <tr>
    <thead>
      <th with="80px">No</th>
      <th>Nombre</th>
      <th>Imagen</th>
      <th>Descripción</th>
      <th width="140px" class="text-center">
        <a href="{{route('createEx', [$idCon, $idExp])}}" class="btn btn-success btn-sm">
          <i class="fas fa-plus"></i>
        </a>
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($examenes as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->exmm_Nombre }}</td>
    <td><img src="{{ asset('images/'.$value->exmm_Imagen) }}" width="45"></td>
    <td>{{ $value->exmm_Descripcion }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editEx', $value->exmm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteEx', $value->exmm_id, $idCon, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}

      <a class="btn btn-hover btn-sm black-background" href="{{route('examenPDF',$value->exmm_id)}}">
        <i style="color: #ffffff;">PDF</i>
      </a>

    </td>

  </tr>
  @endforeach
</table>
@endsection