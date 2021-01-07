<div class="row">
  <div class="col-sm-2">
    {!! form::label('sg_nombre','Nombre de parte del sistema digestivo') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('sg_nombre') ? 'has-error' : "" }}">
      {{ Form::text('sg_nombre',NULL, ['class'=>'form-control', 'id'=>'sg_nombre', 'placeholder'=>'Nombre de parte del sistema digestivo']) }}
      {!! $errors->first('sg_nombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>


<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>