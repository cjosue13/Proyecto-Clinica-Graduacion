@extends('layouts.app')
@section('PageTitle', 'Antecedentes Quirúrgicos')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Antecedentes Quirúrgicos</h2>
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
      <th width="80px">No</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Fecha</th>
      <th width="140px" class="text-center">
      {!! Form::open(['method' => 'GET','route' => ['createQT', $idExp, $tipo],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
          <i class="glyphicon glyphicon-plus"></i>
      </button>
      {!! Form::close() !!}
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($antecedentes as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	atqt_Nombre }}</td>
    <td>{{ $value->	atqt_descripcion }}</td>
    <td>{{ $value->	atqt_fecha }}</td>
    <td>
      <a class="btn btn-hover btn-sm black-background" href="{{route('pacientes.show',$value->pac_id)}}">
        <i style="color: #ffffff;" class="fas fa-bars"></i>
      </a>
      <a class="btn btn-hover btn-sm black-background" href="{{route('pacientes.edit',$value->pac_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>

      {!! Form::open(['method' => 'DELETE','route' => ['pacientes.destroy', $value->pac_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    
    </td>
  </tr>
  @endforeach
</table>
@endsection