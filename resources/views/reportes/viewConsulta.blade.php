@extends('layouts.app')
@section('PageTitle', 'Reportes')
@section('content')
<div class="row">
    <div class="col-sm-2">
        {!! form::label('pac_FechaNacimiento','Fecha de Nacimiento') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('pac_FechaNacimiento') ? 'has-error' : "" }}">
            {{ Form::date('pac_FechaNacimiento',NULL, ['class'=>'form-control', 'id'=>'pac_FechaNacimiento', 'placeholder'=>'YYYY-MM-DD']) }}
            {!! $errors->first('pac_FechaNacimiento', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('pac_FechaNacimiento','Fecha de Nacimiento') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('pac_FechaNacimiento') ? 'has-error' : "" }}">
            {{ Form::date('pac_FechaNacimiento',NULL, ['class'=>'form-control', 'id'=>'pac_FechaNacimiento', 'placeholder'=>'YYYY-MM-DD']) }}
            {!! $errors->first('pac_FechaNacimiento', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>



<div class="form-group">
    {{ Form::button( 'Generar Reporte' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>



@endsection
@section('body')
@endsection