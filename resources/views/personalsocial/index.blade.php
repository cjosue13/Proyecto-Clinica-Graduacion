@extends('layouts.app')
@section('PageTitle', 'PersonalSocial')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Personal Social</h2>
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
      <th>Etapa de Vida</th>
      <th>Descripción</th>
        <th width="140px" class="text-center">
          <a href="{{route('createPS', $idExp)}}" class="btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($personalsocial as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->ps_Etapa }}</td>
    <td>{{ $value->ps_descripcion }}</td>
    <td>
      <a class="btn btn-hover btn-sm black-background" href="{{route('personalsocial.edit',$value->ps_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['personalsocial.destroy', $value->ps_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection