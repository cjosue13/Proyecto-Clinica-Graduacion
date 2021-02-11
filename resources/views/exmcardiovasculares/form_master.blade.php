

<div class="row">
  <div class="col-sm-2">
    {!! form::label('car_tipo','Tipo de palpidos') !!}
    @isset($exmcardiovasculares)
    <?php $tipo = $exmcardiovasculares->car_tipo; ?>
    @endisset

    @empty($exmcardiovasculares)
    <?php $tipo = ''; ?>
    @endempty
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('car_tipo') ? 'has-error' : "" }}">
      {{ Form::select('car_tipo', array('' => 'Seleccione una Opción','normales' => 'normales', 'aritmicos' => 'aritmicos'),
            $tipo ,['class'=>'form-control', 'id'=>'car_tipo']) }}
      {!! $errors->first('car_tipo', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('car_detalle','Descripción:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('car_detalle') ? 'has-error' : "" }}">
            {{ Form::textArea('car_detalle',NULL, ['class'=>'form-control', 'id'=>'car_detalle', 'placeholder'=>'Detalle']) }}
            {!! $errors->first('car_detalle', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>