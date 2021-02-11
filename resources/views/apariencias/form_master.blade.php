<div class="row">
    <div class="col-sm-2">
        {!! form::label('apa_Piel','Piel:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('apa_Piel') ? 'has-error' : "" }}">
            {{ Form::textArea('apa_Piel',NULL, ['class'=>'form-control', 'id'=>'apa_Piel', 'placeholder'=>'Piel']) }}
            {!! $errors->first('apa_Piel', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('apa_Extremidades','Extremidades:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('apa_Extremidades') ? 'has-error' : "" }}">
            {{ Form::textArea('apa_Extremidades',NULL, ['class'=>'form-control', 'id'=>'apa_Extremidades', 'placeholder'=>'Extremidades']) }}
            {!! $errors->first('apa_Extremidades', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('apa_SignosRespiratorios','Signos respiratorios:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('apa_SignosRespiratorios') ? 'has-error' : "" }}">
            {{ Form::textArea('apa_SignosRespiratorios',NULL, ['class'=>'form-control', 'id'=>'apa_SignosRespiratorios', 'placeholder'=>'Signos respiratorios']) }}
            {!! $errors->first('apa_SignosRespiratorios', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('apa_Nasofaringeo','Nasofaringeo:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('apa_Nasofaringeo') ? 'has-error' : "" }}">
            {{ Form::textArea('apa_Nasofaringeo',NULL, ['class'=>'form-control', 'id'=>'apa_Nasofaringeo', 'placeholder'=>'Nasofaringeo']) }}
            {!! $errors->first('apa_Nasofaringeo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>