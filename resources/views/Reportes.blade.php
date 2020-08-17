@extends('layouts.app')
@section('PageTitle', 'Reportes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menú de reportes</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id='div_media'>
                        <nav>
                            <ul id='menu'>
                                <?php if (auth()->user()->tipoUsuario == 'C') { ?>
                                    <a href="{{ route('pdf', auth()->user()->id) }}"><button id="Button3" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-scroll"></i><br><label style="font-size: 20px; cursor: pointer;">Curriculum</label></button></a>
                                <?php } ?>
                                <a href="{{ route('pdf2') }}"><button id="Button2" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-scroll"></i><br><label style="font-size: 20px; cursor: pointer;">Empleos</label></button></a>
                                <a href="{{ route('listaEmpresas') }}"><button id="Button3" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-scroll"></i><br><label style="font-size: 20px; cursor: pointer;">Empresas</label></button></a>
                                <?php if (auth()->user()->tipoUsuario == 'C') { ?>
                                    <a href="{{ route('listaOfertas') }}"><button id="Button4" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-scroll"></i><br><label style="font-size: 20px; cursor: pointer;">Ofertas</label></button></a>
                                <?php } ?>
                                <a href="{{ route('pdf5') }}"><button id="Button1" class="Button1" onclick="CambiarColor(this)"><i class="fas fa-scroll"></i><br><label style="font-size: 20px; cursor: pointer;">Gráfico</label></button></a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection