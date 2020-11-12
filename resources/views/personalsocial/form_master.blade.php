<div class="row">
  <div class="col-sm-2">
    {!! form::label('ps_Etapa','Etapa:') !!}
    @isset($personalsocial)
    <?php $etapa = $personalsocial->ps_Etapa; ?>
    @endisset

    @empty($personalsocial)
    <?php $etapa = ''; ?>
    @endempty
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('ps_Etapa') ? 'has-error' : "" }}">
      {{ Form::select('ps_Etapa', array('' => 'Seleccione una Opción','Niñez' => 'Niñez', 'Adolescencia' => 'Adolescencia', 'Adultez' => 'Adultez',
            'Vejez' => 'Vejez'),
            $etapa ,['class'=>'form-control', 'id'=>'ps_Etapa']) }}
      {!! $errors->first('ps_Etapa', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ps_descripcion','Descripción:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ps_descripcion') ? 'has-error' : "" }}">
            {{ Form::textArea('ps_descripcion',NULL, ['class'=>'form-control', 'id'=>'ps_descripcion', 'placeholder'=>'Descripción']) }}
            {!! $errors->first('ps_descripcion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>