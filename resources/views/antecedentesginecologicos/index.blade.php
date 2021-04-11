@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
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
  <tr >
    <thead>
    <th width="80px">No</th>
    <th>Primer Ciclo Menstrual</th>
    <th>Edad Primer Ciclo Menstrual</th>
    <th>Cantidad de Ciclos menstruales</th>
    <th>Embarazos</th>
    <th>Partos</th>
    <th>Abortos</th>
    <th>Cesareas</th>
    <th>FUR</th>
    <th>FUPAP</th>
    <th>PF</th>
    <th>PF Detalle</th>
    <th>PRS</th>
    <th>NoCS</th>
    <?php if (sizeof($antecedentesginecologicos) == 0) {?>
      <th width="140px" class="text-center">
        <a href="{{route('create', $expediente[0]->exp_id)}}" class="btn btn-success btn-sm">
          <i class="fas fa-plus"></i>
        </a>
      </th>
    <?php } else { ?>
        <th> </th>
      <?php } ?>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($antecedentesginecologicos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	ag_Menarca }}</td>
    <td>{{ $value->	ag_Edad }}</td>
    <td>{{ $value->	ag_CiclosMenstruales }}</td>
    <td>{{ $value->	ag_Embarazos }}</td>
    <td>{{ $value->	ag_Partos }}</td>
    <td>{{ $value->	ag_Abortos }}</td>
    <td>{{ $value->	ag_Cesareas }}</td>	
    <td>{{ $value->	ag_FUR }}</td>
    <td>{{ $value->	ag_FUPAP }}</td>
    <td>{{ $value->	ag_PF }}</td>
    <td>{{ $value->	ag_PF_detalle }}</td>
    <td>{{ $value->	ag_PRS }}</td>	
    <td>{{ $value->	ag_NoCS }}</td>
    <td width='150px'>
      <a class="btn btn-hover btn-sm black-background" href="{{route('antecedentesginecologicos.show',$value->ag_id)}}">
        <i style="color: #ffffff;"  class="fas fa-bars"></i>
      </a>
      <a class="btn btn-hover btn-sm black-background" href="{{route('antecedentesginecologicos.edit',$value->ag_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['eliminar', $value->ag_id, $value->ag_expediente],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
      
    </td>
  </tr>
  @endforeach
</table>
@endsection