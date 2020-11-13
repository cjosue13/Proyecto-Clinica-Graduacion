@extends('layouts.app')
@section('PageTitle', 'Enfermedades No Patológicas')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Enfermedades No Patológicas</h2>
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
      <th>Descripción</th>
      <th width="140px" class="text-center">
        {!! Form::open(['method' => 'GET','route' => ['createNP', $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
      </button>
      {!! Form::close() !!}
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($antNoPatologicos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	eaNomEnfermedad }}</td>
    <td>{{ $value->	ea_Descripcion }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editNP', $value->ea_id, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteNP', $value->ea_id, $idExp],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
      
      <a class="btn btn-info btn-sm btn-block" style="margin-top: 5px;" href="{{route('VerExpediente',$value->ea_id)}}">
        <i class=""></i>Expediente</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection