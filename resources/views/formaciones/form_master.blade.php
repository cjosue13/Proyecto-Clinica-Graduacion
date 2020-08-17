<div class="row">
  <div class="col-sm-2">
    {!! form::label('foTitulo','Titulo') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('foTitulo') ? 'has-error' : "" }}">
      {{ Form::text('foTitulo',NULL, ['class'=>'form-control', 'id'=>'foTitulo', 'placeholder'=>'Titulo']) }}
      {!! $errors->first('foTitulo', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('foEspecialidad','Especialidad') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('xEmpresa') ? 'has-error' : "" }}">
      {{ Form::text('foEspecialidad',NULL, ['class'=>'form-control', 'id'=>'foEspecialidad', 'placeholder'=>'Especialidad']) }}
      {!! $errors->first('foEspecialidad', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('foInstitucion','Institucion') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('foInstitucion') ? 'has-error' : "" }}">
      {{ Form::text('foInstitucion',NULL, ['class'=>'form-control', 'id'=>'foInstitucion', 'placeholder'=>'Institucion']) }}
      {!! $errors->first('foInstitucion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('foFecha','Fecha') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('foFecha') ? 'has-error' : "" }}">
      {{ Form::date('foFecha',NULL, ['class'=>'form-control', 'id'=>'foFecha', 'placeholder'=>'Fecha']) }}
      {!! $errors->first('foFecha', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>