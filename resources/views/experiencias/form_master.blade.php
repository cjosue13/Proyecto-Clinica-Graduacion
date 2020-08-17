<div class="row">
  <div class="col-sm-2">
    {!! form::label('exPuesto','Puesto') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exPuesto') ? 'has-error' : "" }}">
      {{ Form::text('exPuesto',NULL, ['class'=>'form-control', 'id'=>'exPuesto', 'placeholder'=>'Puesto Post...']) }}
      {!! $errors->first('exPuesto', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('exEmpresa','Empresa') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exEmpresa') ? 'has-error' : "" }}">
      {{ Form::text('exEmpresa',NULL, ['class'=>'form-control', 'id'=>'exEmpresa', 'placeholder'=>'Empresa Post...']) }}
      {!! $errors->first('exEmpresa', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('exFechaInicio','Fecha Inicio') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exFechaInicio') ? 'has-error' : "" }}">
      {{ Form::date('exFechaInicio',NULL, ['class'=>'form-control', 'id'=>'exFechaInicio', 'placeholder'=>'FechaInicio Post...']) }}
      {!! $errors->first('exFechaInicio', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('fechaFinal','Fecha Final') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('fechaFinal') ? 'has-error' : "" }}">
      {{ Form::date('fechaFinal',NULL, ['class'=>'form-control', 'id'=>'fechaFinal', 'placeholder'=>'Fecha Final Post...']) }}
      {!! $errors->first('fechaFinal', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('exDescripcion','Descripcion') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exDescripcion') ? 'has-error' : "" }}">
      {{ Form::text('exDescripcion',NULL, ['class'=>'form-control', 'id'=>'exDescripcion', 'placeholder'=>'Descripcion Post...']) }}
      {!! $errors->first('exDescripcion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>