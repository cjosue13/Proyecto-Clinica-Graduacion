<div class="row">
    <div class="col-sm-2">
        {!! form::label('he_enfermedad_fk','Enfermedad:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('he_enfermedad_fk') ? 'has-error' : "" }}">
            <select name="he_enfermedad_fk" class="form-control">
                @foreach($enfermedades as $key =>$value)
                <option value="{{$value->atpnp_id}}" {{ $antHeredoFamiliares->he_enfermedad_fk == $value->atpnp_id ? 'selected' : '' }}>{{$value->atpnp_nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('he_enfermedad_fk', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('he_Parentesco','Parentesco') !!}
    @isset($antHeredoFamiliares)
    <?php $parentesco = $antHeredoFamiliares->he_Parentesco; ?>
    @endisset

    @empty($antHeredoFamiliares)
    <?php $parentesco = ''; ?>
    @endempty
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('he_Parentesco') ? 'has-error' : "" }}">
      {{ Form::select('he_Parentesco', array('' => 'Seleccione una Opción','Padre' => 'Padre', 'Madre' => 'Madre', 'Abuelo' => 'Abuelo','Abuela' => 'Abuela', 'Hermano' => 'Hermano', 'Hermana' => 'Hermana','Tio' => 'Tio','Tia' => 'Tia'),
            $parentesco ,['class'=>'form-control', 'id'=>'he_Parentesco']) }}
      {!! $errors->first('he_Parentesco', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('he_Descripcion','Descripción') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('he_Descripcion') ? 'has-error' : "" }}">
      {{ Form::text('he_Descripcion',NULL, ['class'=>'form-control', 'id'=>'he_Descripcion', 'placeholder'=>'Descripción']) }}
      {!! $errors->first('he_Descripcion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>


<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>