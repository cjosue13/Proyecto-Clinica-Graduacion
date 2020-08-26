<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_pNombre','P.Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : "" }}">
      {{ Form::text('pac_pNombre',NULL, ['class'=>'form-control', 'id'=>'pac_pNombre', 'placeholder'=>'P.Nombre']) }}
      {{ $errors->first('pac_pNombre', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    {!! form::label('pac_sNombre','S.Nombre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : "" }}">
      {{ Form::text('pac_sNombre',NULL, ['class'=>'form-control', 'id'=>'pac_sNombre', 'placeholder'=>'S.Nombre']) }}
      {{ $errors->first('pac_sNombre', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>