<div class="row">
    <div class="col-sm-2">
        {!! form::label('exSg_fkSistemaDigestivo','Parte del sistema:') !!}
        @isset($exmsistemasdigestivos)
        <?php $exSg_fkSistemaDigestivoAux = $exmsistemasdigestivos->exSg_fkSistemaDigestivo; ?>
        @endisset

        @empty($exmsistemasdigestivos)
        <?php $exSg_fkSistemaDigestivoAux = ''; ?>
        @endempty
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exSg_fkSistemaDigestivo') ? 'has-error' : "" }}">
            <select name="exSg_fkSistemaDigestivo" class="form-control">
                @foreach($digestivos as $key =>$value)
                <option value="{{$value->sd_id}}" {{ $exSg_fkSistemaDigestivoAux == $value->sd_id ? 'selected' : '' }}>{{$value->sg_nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('exSg_fkSistemaDigestivo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exSg_Descripcion','Descripción:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exSg_Descripcion') ? 'has-error' : "" }}">
            {{ Form::textArea('exSg_Descripcion',NULL, ['class'=>'form-control', 'id'=>'exSg_Descripcion', 'placeholder'=>'Detalle']) }}
            {!! $errors->first('exSg_Descripcion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>