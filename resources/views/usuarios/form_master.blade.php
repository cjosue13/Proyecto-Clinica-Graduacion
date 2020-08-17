<div class="row">
  <div class="col-sm-2">
    {!! form::label('name','Nombre Real') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : "" }}">
      {{ Form::text('name',NULL, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Nombre Real']) }}
      {{ $errors->first('name', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('username','Nombre de Usuario') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('username') ? 'has-error' : "" }}">
      {{ Form::text('username',NULL, ['class'=>'form-control', 'id'=>'username', 'placeholder'=>'Nombre de Usuario']) }}
      {{ $errors->first('username', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('email','Correo') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : "" }}">
      {{ Form::text('email',NULL, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Correo']) }}
      {{ $errors->first('email', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label(' address','Dirección') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('address') ? 'has-error' : "" }}">
      {{ Form::text('address',NULL, ['class'=>'form-control', 'id'=>'address', 'placeholder'=>'Direccion']) }}
      {{ $errors->first('address', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('phone','Teléfono') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : "" }}">
      {{ Form::text('phone',NULL, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Telefono']) }}
      {{ $errors->first('phone', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('cedula','Cedula') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('cedula') ? 'has-error' : "" }}">
      {{ Form::text('cedula',NULL, ['class'=>'form-control', 'id'=>'cedula', 'placeholder'=>'Cedula']) }}
      {{ $errors->first('cedula', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>