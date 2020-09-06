@extends('layouts.app')
@section('PageTitle', 'Antecedentes Ginecologicos')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Antecedentes Ginecologicos</h2>
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

<table class="table table-bordered">
  <tr >
    <th width="80px">No</th>
    <td>Primer Ciclo Menstrual</td>
    <td>Edad Primer Ciclo Menstrual</td>
    <td>Cantidad de Ciclos menstruales</td>
    <td>Embarazos</td>
    <td>Partos</td>
    <td>Abortos</td>
    <td>Cesareas</td>
    <td>FUR</td>
    <td>FUPAP</td>
    <td>PF</td>
    <td>PF Detalle</td>
    <td>PRS</td>
    <td>NoCS</td>
    <th width="140px" class="text-center">
      <a href="{{route('antecedentesginecologicos.create', $expediente[0]->exp_id)}}" class="btn btn-success btn-sm">
        <i class="glyphicon glyphicon-plus"></i>
      </a>
    </th>
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
    <td>
      <a class="btn btn-info btn-sm" href="{{route('antecedentesginecologicos.show',$value->ag_id)}}">
        <i class="glyphicon glyphicon-th-large"></i></a>
      <a class="btn btn-primary btn-sm" href="{{route('antecedentesginecologicos.edit',$value->ag_id)}}">
        <i class="glyphicon glyphicon-pencil"></i></a>
      {!! Form::open(['method' => 'DELETE','route' => ['antecedentesginecologicos.destroy', $value->ag_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
      {!! Form::close() !!}
      
    </td>
  </tr>
  @endforeach
</table>
@endsection