<div class="row">
  <div class="col-sm-2">
    {!! form::label('cgNombre','Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : "" }}">
      {{ Form::text('cgNombre',NULL, ['class'=>'form-control', 'id'=>'cgNombre', 'placeholder'=>'Nombre']) }}
      {{ $errors->first('cgNombre', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    {!! form::label('cgDescripcion','Descripcion') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('username') ? 'has-error' : "" }}">
      {{ Form::text('cgDescripcion',NULL, ['class'=>'form-control', 'id'=>'cgDescripcion', 'placeholder'=>'Descripcion']) }}
      {{ $errors->first('cgDescripcion', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>