@extends('layouts.app')
@section('PageTitle', 'Examenes Cardiovasculares')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="full-right">
      <h2>Examenes Cardiovasculares</h2>
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
      <th>Palpitaciones</th>
      <th>Detalle</th>
        <th width="140px" class="text-center">
          <a href="{{route('createECAR', $exm_id)}}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i>
          </a>
        </th>
        <th> </th>
    </thead>
  </tr>
  <?php $no = 1; ?>
  @foreach ($exmcardiovasculares as $key => $value)
  <tr>
    <td>{{$no++}}</td>
    <td>{{ $value->car_tipo }}</td>
    <td>{{ $value->car_detalle }}</td>
    <td>
      {!! Form::open(['method' => 'POST','route' => ['editECAR', $value->car_id, $exm_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="fas fa-edit"></i>
      </button>
      {!! Form::close() !!}

      {!! Form::open(['method' => 'DELETE','route' => ['deleteECAR', $value->car_id, $exm_id],'style'=>'display:inline']) !!}
      <button type="submit" style="display: inline;" class="btn btn-hover btn-sm black-background">
        <i style="color: #ffffff;" class="far fa-trash-alt"></i>
      </button>
      {!! Form::close() !!}

    </td>
  </tr>
  @endforeach
</table>
@endsection