<div class="row">
    <div class="col-sm-2">
        {!! form::label('exp_Metas','Metas:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exp_Metas') ? 'has-error' : "" }}">
            {{ Form::text('exp_Metas',NULL, ['class'=>'form-control', 'id'=>'exp_Metas', 'placeholder'=>'Metas']) }}
            {!! $errors->first('exp_Metas', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('exp_Historiabiopatografica','Historia Biopatografica:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('exp_Historiabiopatografica') ? 'has-error' : "" }}">
            {{ Form::text('exp_Historiabiopatografica',NULL, ['class'=>'form-control', 'id'=>'exp_Historiabiopatografica', 'placeholder'=>'Historia Biopatografica']) }}
            {!! $errors->first('exp_Historiabiopatografica', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>