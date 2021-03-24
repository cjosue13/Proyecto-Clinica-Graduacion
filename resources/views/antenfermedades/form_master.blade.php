<div class="row">
  <div class="col-sm-2">
    {!! form::label('atpnp_nombre','Nombre de Enfermedad') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('atpnp_nombre') ? 'has-error' : "" }}">
      {{ Form::text('atpnp_nombre',NULL, ['class'=>'form-control', 'id'=>'atpnp_nombre', 'placeholder'=>'Nombre de Enfermedad']) }}
      {!! $errors->first('atpnp_nombre', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('atpnp_tipo','Tipo') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('atpnp_tipo') ? 'has-error' : "" }}">
      <div class="form-group">
        <div class="radio " >
          <label><input id="columnaRadio" name="atpnp_tipo" type="radio" value="P" @isset($antenfermedades) @if($antenfermedades->atpnp_tipo == 'P')
            {{"checked='checked'"}}
            @endif
            @endisset
            @empty($antenfermedades)
            {{"checked='checked'"}}
            @endempty
            >Patológica</label>
          <label><input id="columnaRadio" name="atpnp_tipo" type="radio" value="N" @isset($antenfermedades) @if($antenfermedades->atpnp_tipo == 'N')
            {{"checked='checked'"}}
            @endif
            @endisset
            >No Patológica</label>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="form-group">
  {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>