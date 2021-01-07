<div class="row">
  <div class="col-sm-2">
    {!! form::label('snc_nombre','Nombre de parte del sistema nervioso') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('snc_nombre') ? 'has-error' : "" }}">
      {{ Form::text('snc_nombre',NULL, ['class'=>'form-control', 'id'=>'snc_nombre', 'placeholder'=>'Nombre de parte del sistema nervioso']) }}
      {!! $errors->first('snc_nombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>


<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>