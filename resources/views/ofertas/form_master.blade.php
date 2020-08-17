<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofNombre','Nombre de Oferta:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofNombre') ? 'has-error' : "" }}">
            {{ Form::text('ofNombre',NULL, ['class'=>'form-control', 'id'=>'ofNombre', 'placeholder'=>'Nombre de Oferta']) }}
            {!! $errors->first('ofNombre', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofCategoria','Categoría:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofCategoria') ? 'has-error' : "" }}">
            <select name="ofCategoria" class="form-control">
                @foreach($categories as $key =>$value)
                <option value='{{$value->cgID}}'>{{$value->cgNombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('ofCategoria', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofDescripcion','Descripción:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofDescripcion') ? 'has-error' : "" }}">
            {{ Form::text('ofDescripcion',NULL, ['class'=>'form-control', 'id'=>'ofDescripcion']) }}
            {!! $errors->first('ofDescripcion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofFechaInicio','Fecha Inicial:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofFechaInicio') ? 'has-error' : "" }}">
            {{ Form::date('ofFechaInicio',NULL, ['class'=>'form-control', 'id'=>'ofFechaInicio', 'placeholder'=>'YYYY-MM-DD']) }}
            {!! $errors->first('ofFechaInicio', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofFechaFinal','Fecha Final:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofFechaFinal') ? 'has-error' : "" }}">
            {{ Form::date('ofFechaFinal',NULL, ['class'=>'form-control', 'id'=>'ofFechaFinal', 'placeholder'=>'YYYY-MM-DD']) }}
            {!! $errors->first('ofFechaFinal', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofUbicacion','Ubicación:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofUbicacion') ? 'has-error' : "" }}">
            {{ Form::text('ofUbicacion',NULL, ['class'=>'form-control', 'id'=>'ofUbicacion']) }}
            {!! $errors->first('ofUbicacion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofHorario','Horario:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofHorario') ? 'has-error' : "" }}">
            {{ Form::text('ofHorario',NULL, ['class'=>'form-control', 'id'=>'ofHorario']) }}
            {!! $errors->first('ofHorario', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofVacantes','Cantidad de Vacantes:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofVacantes') ? 'has-error' : "" }}">
            {{ Form::text('ofVacantes',NULL, ['class'=>'form-control', 'id'=>'ofVacantes', 'placeholder'=>'Número de Vacantes']) }}
            {!! $errors->first('ofVacantes', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ofSueldo','Sueldo:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ofSueldo') ? 'has-error' : "" }}">
            {{ Form::text('ofSueldo',NULL, ['class'=>'form-control', 'id'=>'ofSueldo']) }}
            {!! $errors->first('ofSueldo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>