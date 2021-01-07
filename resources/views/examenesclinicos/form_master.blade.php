<div class="row">
  <div class="col-sm-2">
    {!! form::label('exm_peso','Peso:') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exm_peso') ? 'has-error' : "" }}">
      {{ Form::text('exm_peso',NULL, ['class'=>'form-control', 'id'=>'exm_peso', 'placeholder'=>'Peso del Paciente']) }}
      {!! $errors->first('exm_peso', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exm_altura','Estatura:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exm_altura') ? 'has-error' : "" }}">
            {{ Form::text('exm_altura',NULL, ['class'=>'form-control', 'id'=>'exm_altura', 'placeholder'=>'Estatura del Paciente']) }}
            {!! $errors->first('exm_altura', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exm_FC','Frecuencia Cardiaca(lat/mm):') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exm_FC') ? 'has-error' : "" }}">
            {{ Form::text('exm_FC',NULL, ['class'=>'form-control', 'id'=>'exm_FC', 'placeholder'=>'Frecuencia Cardiaca del Paciente']) }}
            {!! $errors->first('exm_FC', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exm_Temperatura','Temperatura(°C):') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exm_Temperatura') ? 'has-error' : "" }}">
            {{ Form::text('exm_Temperatura',NULL, ['class'=>'form-control', 'id'=>'exm_Temperatura', 'placeholder'=>'Temperatura del Paciente']) }}
            {!! $errors->first('exm_Temperatura', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exm_sistolica','Sistólica:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exm_sistolica') ? 'has-error' : "" }}">
            {{ Form::text('exm_sistolica',NULL, ['class'=>'form-control', 'id'=>'exm_sistolica', 'placeholder'=>'Presión Sistólica del Paciente']) }}
            {!! $errors->first('exm_sistolica', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exm_diastolica','Diastólica:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exm_diastolica') ? 'has-error' : "" }}">
            {{ Form::text('exm_diastolica',NULL, ['class'=>'form-control', 'id'=>'exm_diastolica', 'placeholder'=>'Presión Diastólica del Paciente']) }}
            {!! $errors->first('exm_diastolica', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>