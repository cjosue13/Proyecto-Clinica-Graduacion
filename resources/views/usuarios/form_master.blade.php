<div class="card-body">
  <div class="row">
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('name') ? 'has-error' : "" }}">
        {{ Form::text('name',NULL, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Nombre Real']) }}
        {{ $errors->first('name', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('username') ? 'has-error' : "" }}">
        {{ Form::text('username',NULL, ['class'=>'form-control', 'id'=>'username', 'placeholder'=>'Nombre de Usuario']) }}
        {{ $errors->first('username', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('email') ? 'has-error' : "" }}">
        {{ Form::text('email',NULL, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Correo']) }}
        {{ $errors->first('email', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      @error('password')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('address') ? 'has-error' : "" }}">
        {{ Form::text('address',NULL, ['class'=>'form-control', 'id'=>'address', 'placeholder'=>'Direccion']) }}
        {{ $errors->first('address', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('phone') ? 'has-error' : "" }}">
        {{ Form::text('phone',NULL, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Telefono']) }}
        {{ $errors->first('phone', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-0">
      <label for="tipoUsuario" class="columnaRadio">{{ __('Tipo de Usuario:') }}</label>
      <div class="radio ">
        <label class="textaa"><input id="columnaRadio" name="tipoUsuario" type="radio" value="D">Doctor</label>
        <label class="textaa"><input id="columnaRadio" checked="checked" name="tipoUsuario" type="radio" value="S">Secretaria/o</label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-10">
      <div class="form-group {{ $errors->has('cedula') ? 'has-error' : "" }}">
        {{ Form::text('cedula',NULL, ['class'=>'form-control', 'id'=>'cedula', 'placeholder'=>'Cedula']) }}
        {{ $errors->first('cedula', '<p class="help-block">:message</p>') }}
      </div>
    </div>
  </div>

  <div class="form-group">
    {{ Form::button(isset($model)? 'Actualizar' : 'Guardar' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
  </div>
</div>