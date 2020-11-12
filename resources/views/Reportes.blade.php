@extends('layouts.app')
@section('PageTitle', 'Reportes')
@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style=" text-align:center; color: #209f85; font-size: 20px; cursor: pointer;" >Menú de reportes</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id='div_media'>
                        <nav>
                            <ul id='menu'>
                                <?php //if (auth()->user()->tipoUsuario == 'C') { ?>
                                    <a href="{{ route('pdf', auth()->user()->id) }}"><button id="Button1" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="fas fa-scroll"></i><br><label class="textocool">Curriculum</label></button></a>
                                <?php //} ?>
                                <a style=" outline:none;" href="{{ route('pdf2') }}"><button id="Button1" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="fas fa-scroll"></i><br><label class="textocool">Empleos</label></button></a>
                                <a style=" outline:none;" href="{{ route('listaEmpresas') }}"><button id="Button1" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="fas fa-scroll"></i><br><label class="textocool">Empresas</label></button></a>
                                <?php //if (auth()->user()->tipoUsuario == 'C') { ?>
                                    <a href="{{ route('listaOfertas') }}"><button id="Button4" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="fas fa-scroll"></i><br><label class="textocool">Ofertas</label></button></a>
                                <?php //} ?>
                                <a style=" outline:none;" href="{{ route('pdf5') }}"><button id="Button1" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="fas fa-scroll"></i><br><label class="textocool">Gráfico</label></button></a>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection