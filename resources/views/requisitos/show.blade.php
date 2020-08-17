@extends('layouts.app')
@section('PageTitle', 'Requisitos')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <br />
            <a class="btn btn-primary" href="{{ route('offer',['id'=>$rqOfertaTrabajo])}}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Usuario : </strong>
            {{ $requisitos->rqNombre}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Observaciones : </strong>
            {{ $requisitos->rqDescripcion}}
        </div>
    </div>
</div>
@endsection