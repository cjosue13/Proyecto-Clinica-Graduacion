@extends('layouts.app')
@section('PageTitle', 'Expedientes')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Expedientes</h2>
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
  <tr>
    <th with="80px">No</th>
    <td>Metas</td>
    <td>Historia Biopatografica</td>
    <?php if (sizeof($expediente) == 0) {?>
      <th width="140px" class="text-center">
        <a href="{{route('createExp', $paciente[0]->pac_id)}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    <?php } ?>
  </tr>
  <?php $no = 1; ?>
  @foreach ($expediente as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->exp_Metas }}</td>
    <td>{{ $value->exp_Historiabiopatografica }}</td>
    <td>
      <a class="btn btn-info btn-sm" href="{{route('expediente.show',$value->exp_id)}}">
        <i class="glyphicon glyphicon-th-large"></i></a>
      <a class="btn btn-primary btn-sm" href="{{route('expediente.edit',$value->exp_id)}}">
        <i class="glyphicon glyphicon-pencil"></i></a>
      {!! Form::open(['method' => 'DELETE','route' => ['expediente.destroy', $value->exp_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
      {!! Form::close() !!}
      <a class="btn btn-info btn-sm" href="{{route('VerAntecedenteGinecologico',$value->exp_id)}}">
      Antecedentes Ginecologicos</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection