<div class="row">
  <div class="col-sm-2">
    {!! form::label('atqt_Nombre','Nombre del Antecedente') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('atqt_Nombre') ? 'has-error' : "" }}">
      {{ Form::text('atqt_Nombre',NULL, ['class'=>'form-control', 'id'=>'atqt_Nombre', 'placeholder'=>'Nombre del Antecedente']) }}
      {!! $errors->first('atqt_Nombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('atqt_fecha','Fecha') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('atqt_fecha') ? 'has-error' : "" }}">
      {{ Form::date('atqt_fecha',NULL, ['class'=>'form-control', 'id'=>'atqt_fecha', 'placeholder'=>'YYYY-MM-DD']) }}
      {!! $errors->first('atqt_fecha', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('atqt_descripcion','Descripción') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_sNombre') ? 'has-error' : "" }}">
      {{ Form::textarea('atqt_descripcion',NULL, ['class'=>'form-control', 'id'=>'atqt_descripcion', 'placeholder'=>'Descripción']) }}
      {!! $errors->first('atqt_descripcion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>



<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>