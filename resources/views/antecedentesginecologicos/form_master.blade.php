<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_Menarca','Primer Ciclo Menstrual') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_Menarca') ? 'has-error' : "" }}">
            {{ Form::date('ag_Menarca',NULL, ['class'=>'form-control', 'id'=>'ag_Menarca', 'placeholder'=>'YYYY-MM-DD']) }}
            {!! $errors->first('ag_Menarca', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_Edad','Edad Primer Ciclo Menstrual') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_Edad') ? 'has-error' : "" }}">
            {{ Form::number('ag_Edad',NULL, ['class'=>'form-control', 'id'=>'ag_Edad', 'placeholder'=>'Edad Primer Ciclo Menstrual', 'max'=>'20']) }}
            {!! $errors->first('ag_Edad', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_CiclosMenstruales','Cantidad de Ciclos menstruales') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('aag_CiclosMenstruales') ? 'has-error' : "" }}">
            {{ Form::number('ag_CiclosMenstruales',NULL, ['class'=>'form-control', 'id'=>'ag_CiclosMenstruales', 'placeholder'=>'Cantidad de Ciclos menstruales']) }}
            {!! $errors->first('ag_CiclosMenstruales', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_Embarazos','Embarazos') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_Embarazos') ? 'has-error' : "" }}">
            {{ Form::number('ag_Embarazos',NULL, ['class'=>'form-control', 'id'=>'ag_Embarazos', 'placeholder'=>'Embarazos']) }}
            {!! $errors->first('ag_Embarazos', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_Partos','Partos') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_Partos') ? 'has-error' : "" }}">
            {{ Form::number('ag_Partos',NULL, ['class'=>'form-control', 'id'=>'ag_Partos', 'placeholder'=> 'Partos']) }}
            {!! $errors->first('ag_Partos', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_Abortos','Abortos') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_Abortos') ? 'has-error' : "" }}">
            {{ Form::number('ag_Abortos',NULL, ['class'=>'form-control', 'id'=>'ag_Abortos', 'placeholder'=> 'Abortos']) }}
            {!! $errors->first('ag_Abortos', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_Cesareas','Cesareas:') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_Cesareas') ? 'has-error' : "" }}">
            {{ Form::number('ag_Cesareas',NULL, ['class'=>'form-control', 'id'=>'ag_Cesareas', 'placeholder'=>'Cesareas']) }}
            {!! $errors->first('ag_Cesareas', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_FUR','FUR') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_FUR') ? 'has-error' : "" }}">
            {{ Form::date('ag_FUR',NULL, ['class'=>'form-control', 'id'=>'ag_FUR', 'placeholder'=> 'FUR']) }}
            {!! $errors->first('ag_FUR', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_FUPAP','FUPAP') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_FUPAP') ? 'has-error' : "" }}">
            {{ Form::date('ag_FUPAP',NULL, ['class'=>'form-control', 'id'=>'ag_FUPAP', 'placeholder'=> 'FUPAP']) }}
            {!! $errors->first('ag_FUPAP', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_PF','PF') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_PF') ? 'has-error' : "" }}">
            <div class="form-group">
                <div class="radio " style="left: 0%;">
                <label><input id="columnaRadio" name="ag_PF" type="radio" value="V"
                    @isset($pacientes)
                      @if($pacientes->ag_PF == 'V')
                        {{"checked='checked'"}}
                      @endif 
                    @endisset 
                    @empty($pacientes) 
                      {{"checked='checked'"}} 
                    @endempty
                    >  Si</label>
                    <label><input id="columnaRadio" name="ag_PF" type="radio" value="F" 
                    @isset($pacientes)
                      @if($pacientes->ag_PF == 'F')
                        {{"checked='checked'"}}
                      @endif 
                    @endisset 
                    >  No</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_PF_detalle','PF Detalle') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_PF_detalle') ? 'has-error' : "" }}">
            {{ Form::text('ag_PF_detalle',NULL, ['class'=>'form-control', 'id'=>'ag_PF_detalle', 'placeholder'=> 'PF Detalle']) }}
            {!! $errors->first('ag_PF_detalle', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_PRS','PRS') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_PRS') ? 'has-error' : "" }}">
            {{ Form::date('ag_PRS',NULL, ['class'=>'form-control', 'id'=>'ag_PRS', 'placeholder'=> 'YYYY-MM-DD']) }}
            {!! $errors->first('ag_PRS', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        {!! form::label('ag_NoCS','NoCS') !!}
    </div>
    <div class="col-sm-10">
        <div class="form-group {{ $errors->has('ag_NoCS') ? 'has-error' : "" }}">
            {{ Form::number('ag_NoCS',NULL, ['class'=>'form-control', 'id'=>'ag_NoCS', 'placeholder'=> 'NoCS']) }}
            {!! $errors->first('ag_NoCS', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>