@extends('layouts.app')
@section('PageTitle', 'Expedientes')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="col-lg-12">
      <a class="btn btn-primary float-right"href="{{ url('pacientes') }}"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="full-right">
      <h2> Expediente de  {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
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
      <th>Metas</th>
      <th>Historia Biopatografica</th>
      <?php if (sizeof($expediente) == 0) { ?>
        <th width="140px" class="text-center">
          <a href="{{route('createExp', $paciente[0]->pac_id)}}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i>
          </a>
        </th>
      <?php } else { ?>
        <th> </th>
      <?php } ?>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($expediente as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->exp_Metas }}</td>
    <td>{{ $value->exp_Historiabiopatografica }}</td>
    <td>
      <a class="btn btn-hover btn-sm black-background" href="{{route('expediente.show',$value->exp_id)}}">
        <i style="color: #ffffff;" class="fas fa-bars"></i>
      </a>
      <a class="btn btn-hover btn-sm black-background" href="{{route('expediente.edit',$value->exp_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['expediente.destroy', $value->exp_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
      {!! Form::open(['method' => 'POST','route' => ['MenuAntecedentes', $value->exp_id,$paciente[0]->pac_Genero, $paciente[0]->pac_pNombre,$paciente[0]->pac_pApellido, $paciente[0]->pac_id ],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;">Antecedentes</i>
      </button>
      {!! Form::close() !!}
      
    </td>
  </tr>
  @endforeach
</table>
@endsection