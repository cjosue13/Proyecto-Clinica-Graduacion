<div class="row">
    <div class="col-sm-2">
        {!! form::label('ea_enfermedad','Enfermedad:') !!}
        @isset($antNoPatologicos)
        <?php $ea_enfermedadAux = $antNoPatologicos->ea_enfermedad; ?>
        @endisset

        @empty($antNoPatologicos)
        <?php $ea_enfermedadAux = ''; ?>
        @endempty
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ea_enfermedad') ? 'has-error' : "" }}">
            <select name="ea_enfermedad" class="form-control">
                @foreach($enfermedades as $key =>$value)
                <option value="{{$value->atpnp_id}}" {{ $ea_enfermedadAux == $value->atpnp_id ? 'selected' : '' }}>{{$value->atpnp_nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('ea_enfermedad', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('ea_Descripcion','Descripción') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('ea_Descripcion') ? 'has-error' : "" }}">
      {{ Form::textarea('ea_Descripcion',NULL, ['class'=>'form-control', 'id'=>'ea_Descripcion', 'placeholder'=>'Descripción']) }}
      {!! $errors->first('ea_Descripcion', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>


<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>