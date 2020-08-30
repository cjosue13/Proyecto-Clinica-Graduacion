@extends('layouts.app')
@section('PageTitle', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img class="wave" src="img/wave.png">
                <div class="card-header">Menú</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id='div_media'>
                        <nav>
                            <ul id='menu'>
                                <a href="{{ url('agenda') }}"><button id="Button1" class="Button1" onclick="CambiarColor(this)"><i class="far fa-file-alt"></i><br><label style="font-size: 20px; cursor: pointer;">Agenda</label></button></a>
                                <a href="{{ url('pacientes') }}"><button id="Button3" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-id-card-alt"></i><br><label style="font-size: 20px; cursor: pointer;">Pacientes</label></button></a>
                                <a href="{{ url('expediente') }}"><button id="Button2" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-user-circle"></i><br><label style="font-size: 20px; cursor: pointer;">Expedientes</label></button></a>
                                <a href="{{ url('ofertas') }}"><button id="Button3" class="Button1" onclick="CambiarColor(this)"><i class="far fa-address-card"></i><br><label style="font-size: 20px; cursor: pointer;">Perfil</label></button></a>
                                <a href="{{ route('reportes') }}"><button id="Button3" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-scroll"></i><br><label style="font-size: 20px; cursor: pointer;">Reportes</label></button></a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection