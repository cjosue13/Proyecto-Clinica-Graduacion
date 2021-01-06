@extends('layouts.app')
@section('PageTitle', 'Enfermedades HeredoFamiliares')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Enfermedades HeredoFamiliares de {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
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
      <th>Enfermedad</th>
      <th>Parentesco</th>
      <th>Descripción</th>
      <th width="140px" class="text-center">
        {!! Form::open(['method' => 'GET','route' => ['createHF', $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
      </button>
      {!! Form::close() !!}
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($antHeredoFamiliares as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	eaNomEnfermedad }}</td>
    <td>{{ $value->	he_Parentesco }}</td>
    <td>{{ $value->	he_Descripcion }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editHF', $value->he_id, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteHF', $value->he_id, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection