@extends('layouts.app')
@section('PageTitle', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style=" text-align:center; color: #209f85; font-size: 20px; cursor: pointer;" >Menú</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id='div_media'>
                        <nav>
                            <ul id='menu'>
                                <a style=" outline:none;" href="{{ url('agenda') }}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1"><i style="outline:none; color: #209f85;"  class="far fa-file-alt"></i><br><label class="textocool" >Agenda</label></button></a>
                                <a style=" outline:none;" href="{{ url('pacientes') }}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i  style="outline:none; color: #209f85;" class="fas fa-id-card-alt"></i><br><label class="textocool">Pacientes</label></button></a>
                                <a style=" outline:none;" href="{{ url('usuarios') }}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i   style="outline:none; color: #209f85;" class="far fa-address-card"></i><br><label class="textocool">Perfil</label></button></a>
                                <a style=" outline:none;" href="{{route('usuarios.create')}}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i     style="outline:none; color: #209f85;" class="fas fa-user-alt"></i><br><label class="textocool">Registrar</label></button></a>
                                <a style=" outline:none;" href="{{ url('antenfermedades') }}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i  style="outline:none; color: #209f85;" class="fas fa-id-card-alt"></i><br><label class="textocool2">Enfermedades</label></button></a>
                                <a style=" outline:none;" href="{{ route('reportes') }}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="fas fa-scroll"></i><br><label class="textocool">Reportes</label></button></a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection