<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','Primer Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pNombre') ? 'has-error' : "" }}">
      {{ Form::text('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'Primer Nombre']) }}
      {!! $errors->first('pac_pNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_sNombre','Segundo Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_sNombre') ? 'has-error' : "" }}">
      {{ Form::text('pac_sNombre',NULL, ['class'=>'form-control', 'id'=>'pac_sNombre', 'placeholder'=>'Segundo Nombre']) }}
      {!! $errors->first('pac_sNombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pApellido','Primer Apellido') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_pApellido') ? 'has-error' : "" }}">
      {{ Form::text('pac_pApellido',NULL, ['class'=>'form-control', 'id'=>'pac_pApellido', 'placeholder'=>'Primer Apellido']) }}
      {!! $errors->first('pac_pApellido', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_sApellido','Segundo Apellido') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_sApellido') ? 'has-error' : "" }}">
      {{ Form::text('pac_sApellido',NULL, ['class'=>'form-control', 'id'=>'pac_sApellido', 'placeholder'=>'Segundo Apellido']) }}
      {!! $errors->first('pac_sApellido', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Cedula','Cedula') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Cedula') ? 'has-error' : "" }}">
      {{ Form::text('pac_Cedula',NULL, ['class'=>'form-control', 'id'=>'pac_Cedula', 'placeholder'=> 'Cedula']) }}
      {!! $errors->first('pac_Cedula', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_FechaNacimiento','Fecha de Nacimiento') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_FechaNacimiento') ? 'has-error' : "" }}">
      {{ Form::date('pac_FechaNacimiento',NULL, ['class'=>'form-control', 'id'=>'pac_FechaNacimiento', 'placeholder'=>'YYYY-MM-DD']) }}
      {!! $errors->first('pac_FechaNacimiento', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Residencia','Residencia') !!}
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
    {!! form::label('pac_Correo','Correo') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Correo') ? 'has-error' : "" }}">
      {{ Form::email('pac_Correo',NULL, ['class'=>'form-control', 'id'=>'pac_Correo', 'placeholder'=> 'Correo'] ) }}
      {!! $errors->first('pac_Correo', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Profesion_Oficio','Profesion / Oficio') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Profesion_Oficio') ? 'has-error' : "" }}">
      {{ Form::text('pac_Profesion_Oficio',NULL, ['class'=>'form-control', 'id'=>'pac_Profesion_Oficio', 'placeholder'=> 'Profesion/Oficio']) }}
      {!! $errors->first('pac_Profesion_Oficio', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>


<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_EstadoCivil','Estado Civil') !!}
    @isset($pacientes)
    <?php $estadoCivil = $pacientes->pac_EstadoCivil; ?>
    @endisset

    @empty($pacientes)
    <?php $estadoCivil = ''; ?>
    @endempty
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_EstadoCivil') ? 'has-error' : "" }}">
      {{ Form::select('pac_EstadoCivil', array('' => 'Seleccione una Opción','ST' => 'Soltero', 'CO' => 'Comprometido', 'ER' => 'En una Relación',
            'CA' => 'Casado/Casada', 'UL' => 'Unión Libre', 'SP' => 'Separado', 'DV' => 'Divorciado', 'VD' => 'Viudo'),
            $estadoCivil ,['class'=>'form-control', 'id'=>'pac_EstadoCivil']) }}
      {!! $errors->first('pac_EstadoCivil', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>



<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Religion','Religión') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Religion') ? 'has-error' : "" }}">
      {{ Form::text('pac_Religion',NULL, ['class'=>'form-control', 'id'=>'pac_Religion', 'placeholder'=> 'Religión']) }}
      {!! $errors->first('pac_Religion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_Genero','Genero') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('pac_Genero') ? 'has-error' : "" }}">
      <div class="form-group">
        <div class="radio " style="left: 0%;">
          <label><input id="columnaRadio" name="pac_Genero" type="radio" value="M" @isset($pacientes) @if($pacientes->pac_Genero == 'M')
            {{"checked='checked'"}}
            @endif
            @endisset
            @empty($pacientes)
            {{"checked='checked'"}}
            @endempty
            >Masculino</label>
          <label><input id="columnaRadio" name="pac_Genero" type="radio" value="F" @isset($pacientes) @if($pacientes->pac_Genero == 'F')
            {{"checked='checked'"}}
            @endif
            @endisset
            >Femenino</label>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>