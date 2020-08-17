<div class="row">
  <div class="col-sm-2">
    {!! form::label('rqNombre','Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('rqNombre') ? 'has-error' : "" }}">
      {{ Form::text('rqNombre',NULL, ['class'=>'form-control', 'id'=>'rqNombre', 'placeholder'=>'Nombre']) }}
      {!! $errors->first('rqNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('rqDescripcion','Observaciones') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('rqDescripcion') ? 'has-error' : "" }}">
      {{ Form::text('rqDescripcion',NULL, ['class'=>'form-control', 'id'=>'rqDescripcion', 'placeholder'=>'Observaciones']) }}
      {!! $errors->first('rqDescripcion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>