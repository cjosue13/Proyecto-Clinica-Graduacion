@extends('layouts.app')
@section('PageTitle', 'Sistema Nervioso')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Sistema Nervioso</h2>
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
      <th width="140px" class="text-center">
        <a href="{{route('sistemanerviosos.create')}}" class="btn btn-success btn-sm">
          <i class="glyphicon glyphicon-plus"></i>
        </a>
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($sistemanerviosos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	snc_nombre }}</td>
    <td>
      <a class="btn btn-hover btn-sm black-background" href="{{route('sistemanerviosos.edit',$value->snc_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['sistemanerviosos.destroy', $value->snc_id] ,'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection