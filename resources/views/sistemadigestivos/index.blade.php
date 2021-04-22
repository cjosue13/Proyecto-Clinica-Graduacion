@extends('layouts.app')
@section('PageTitle', 'Sistema Digestivo')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="col-lg-12">
      <a class="btn btn-primary float-right" href="{{ url('/home') }}"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="full-right">
      <h2>Sistema Digestivo</h2>
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
        <a href="{{route('sistemadigestivos.create')}}" class="btn btn-success btn-sm">
          <i class="fas fa-plus"></i>
        </a>
      </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($sistemadigestivos as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->	sg_nombre }}</td>
    <td>
      <a class="btn btn-hover btn-sm black-background" href="{{route('sistemadigestivos.edit',$value->sd_id)}}">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </a>
      {!! Form::open(['method' => 'DELETE','route' => ['sistemadigestivos.destroy', $value->sd_id] ,'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endsection