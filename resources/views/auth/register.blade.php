@extends('layouts.app')
@section('PageTitle', 'Registro')
@section('content')

<div class="containerAux">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img class="wave" src="img/wave.png">
                <div class="TituloLogin">Registro</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nombre Completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="username" placeholder="Nombre de Usuario" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Correo Electrónico" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirmar Contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="address" type="address" placeholder="Dirección" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="phone" type="phone" placeholder="Teléfono" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tipoUsuario" class="columnaRadio">{{ __('Tipo de Usuario:') }}</label>
                            <!--<label>
                                E == Empresa
                                {{ Form::radio('tipoUsuario', 'E', ['class'=>'with-gap']) }}<span>Empresa</span>
                            </label>
                            <label>
                                C = Candidatos
                                {{ Form::radio('tipoUsuario', 'C', ['class'=>'with-gap']) }}<span>Candidatos</span>
                            </label>-->
                            <div class="radio ">
                                <label class="textaa"><input id="columnaRadio" name="tipoUsuario" type="radio" value="E">Empresa</label>
                            </div>
                            <div class="radio ">
                                <label class="textaa"><input id="columnaRadio" checked="checked" name="tipoUsuario" type="radio" value="C">Candidatos</label>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-3 col-form-label text-md-right"></div>
                            <div class="col-md-6">
                                <input id="cedula" type="cedula" placeholder="Cédula" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula">
                                @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btnLogin">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection