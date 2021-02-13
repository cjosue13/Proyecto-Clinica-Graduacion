@extends('layouts.app')
<?php if($tipo == 'q') {?>
  @section('PageTitle', 'Antecedentes Quirúrgicos')
<?php } else {?>
  @section('PageTitle', 'Antecedentes Traumáticos')
<?php }?>
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
    <?php if($tipo == 'q') {?>
      <h2>Antecedentes Quirúrgicos de  {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
      <?php } else {?>
        <h2>Antecedentes Traumáticos de  {{$paciente[0]->pac_pApellido}} {{$paciente[0]->pac_sApellido}} {{$paciente[0]->pac_pNombre}}</h2>
        <?php }?>
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
      <button type="submit" style="display: inline;" class="btn btn-success btn-sm">
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
      <!--<a class="btn btn-hover btn-sm black-background" href="{{route('antQuiruTrau.show',$value->atqt_id)}}">
        <i style="color: #ffffff;" class="fas fa-bars"></i>
      </a>-->

      {!! Form::open(['method' => 'POST','route' => ['editQT', $value->atqt_id, $idExp, $tipo],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteQT', $value->atqt_id, $idExp, $tipo],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    
    </td>
  </tr>
  @endforeach
</table>
@endsection