<div class="row">
  <div class="col-sm-2">
    {!! form::label('crObservaciones','Observaciones') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('crObservaciones') ? 'has-error' : "" }}">
      {{ Form::text('crObservaciones',NULL, ['class'=>'form-control', 'id'=>'crObservaciones', 'placeholder'=>'Observaciones']) }}
      {!! $errors->first('crObservaciones', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>
<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>