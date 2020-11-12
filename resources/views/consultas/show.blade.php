@extends('layouts.app')
@section('PageTitle', 'Mi Perfil')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Expediente</h2>
        </div>
        <div class="pull-right">
            <br />
            <a class="btn btn-primary" href="{{ route('indexConsulta', $idExp) }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Metas : </strong>
        {{ $expediente->exp_Metas}}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Historia Biopatografica : </strong>
        {{ $expediente->exp_Historiabiopatografica}}
    </div>
</div>


@endsection