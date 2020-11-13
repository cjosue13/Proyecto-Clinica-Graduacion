<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_FechaNacimiento','Fecha de Consulta') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_FechaNacimiento') ? 'has-error' : "" }}">
      {{ Form::date('pac_FechaNacimiento',Carbon\Carbon::now(), ['class'=>'form-control', 'id'=>'pac_FechaNacimiento', 'placeholder'=>'YYYY-MM-DD']) }}
      {!! $errors->first('pac_FechaNacimiento', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Religion','Hora') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Religion') ? 'has-error' : "" }}">
      {{ Form::time('pac_Religion',Carbon\Carbon::now(), ['class'=>'form-control', 'id'=>'pac_Religion', 'placeholder'=> 'Religión']) }}
      {!! $errors->first('pac_Religion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Motivo') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Historia de padecimiento') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Problemas') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Síntoma Psíquico') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Diagnóstico') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>



<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Indicaciones') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Recomendaciones') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::textArea('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>





<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Residencia','Nombre de Acompañante') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Residencia') ? 'has-error' : "" }}">
      {{ Form::text('pac_Residencia',NULL, ['class'=>'form-control', 'id'=>'pac_Residencia', 'placeholder'=> 'Residencia']) }}
      {!! $errors->first('pac_Residencia', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>



<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_EstadoCivil','Tipo de Examen') !!}
    @isset($pacientes)
    <?php $estadoCivil = $pacientes->pac_EstadoCivil; ?>
    @endisset

    @empty($pacientes)
    <?php $estadoCivil = ''; ?>
    @endempty
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_EstadoCivil') ? 'has-error' : "" }}">
      {{ Form::select('pac_EstadoCivil', array('' => 'Seleccione una Opción','F' => 'Físico', 'G' => 'General', 'P' => 'Psíquico'),
            $estadoCivil ,['class'=>'form-control', 'id'=>'pac_EstadoCivil']) }}
      {!! $errors->first('pac_EstadoCivil', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>






<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>