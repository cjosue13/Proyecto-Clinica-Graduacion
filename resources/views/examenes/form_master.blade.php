<div class="row">
  <div class="col-sm-2">
    {!! form::label('exmm_Nombre','Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exmm_Nombre') ? 'has-error' : "" }}">
      {{ Form::text('exmm_Nombre',NULL, ['class'=>'form-control', 'id'=>'exmm_Nombre', 'placeholder'=>'Nombre de Examen']) }}
      {!! $errors->first('exmm_Nombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('exmm_Descripcion','Descripción:') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exmm_Descripcion') ? 'has-error' : "" }}">
      {{ Form::textArea('exmm_Descripcion',NULL, ['class'=>'form-control', 'id'=>'exmm_Descripcion', 'placeholder'=>'Descripción']) }}
      {!! $errors->first('exmm_Descripcion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
@if ($message = Session::get('success'))
<div class="row">
  <div class="col-sm-2">
    {!! form::label('exmm_Imagen','Imagen Cargada:') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exmm_Imagen') ? 'has-error' : "" }}">
      {{ Form::text('exmm_Imagen', Session::get('image'), ['readonly', 'class'=>'form-control', 'id'=>'exmm_Imagen']) }}
      <br>
      <img src="/images/{{ Session::get('image') }}" width="60">
      {!! $errors->first('exmm_Imagen', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
@elseif (isset($examenes))
<div class="row">
  <div class="col-sm-2">
    {!! form::label('exmm_Imagen','Imagen Cargada:') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('exmm_Imagen') ? 'has-error' : "" }}">
      {{ Form::text('exmm_Imagen',(isset($image))? $image :NULL, ['readonly', 'class'=>'form-control', 'id'=>'exmm_Imagen']) }}
      <br>
      <img src="/images/{{ (isset($image))? $image:$examenes->exmm_Imagen }}" width="60">
      {!! $errors->first('exmm_Imagen', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
@endif

<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>