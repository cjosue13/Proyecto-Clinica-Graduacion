<div class="row">
    <div class="col-sm-2">
        {!! form::label('exSn_fkSistemaNerviosoC','Parte del sistema:') !!}
        @isset($exmsistemasnerviosos)
        <?php $exmsistemasnerviososAux = $exmsistemasnerviosos->exSn_fkSistemaNerviosoC; ?>
        @endisset

        @empty($exmsistemasnerviosos)
        <?php $exmsistemasnerviososAux = ''; ?>
        @endempty
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exSn_fkSistemaNerviosoC') ? 'has-error' : "" }}">
            <select name="exSn_fkSistemaNerviosoC" class="form-control">
                @foreach($nerviosos as $key =>$value)
                <option value="{{$value->snc_id}}" {{ $exmsistemasnerviososAux == $value->snc_id ? 'selected' : '' }}>{{$value->snc_nombre}}</option>
                @endforeach
            </select>
            {!! $errors->first('exSn_fkSistemaNerviosoC', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exSn_detalle','Descripción:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exSn_detalle') ? 'has-error' : "" }}">
            {{ Form::textArea('exSn_detalle',NULL, ['class'=>'form-control', 'id'=>'exSn_detalle', 'placeholder'=>'Detalle']) }}
            {!! $errors->first('exSn_detalle', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>