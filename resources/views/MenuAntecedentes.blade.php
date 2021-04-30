@extends('layouts.app')
@section('PageTitle', 'Menú Antecedentes')
@section('content')
<div class="col-lg-12">
    <a class="btn btn-primary float-right" href="{{route('VerExpediente',$pac_id)}}"> <i class="fas fa-arrow-left"></i></a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style=" text-align:center; color: #209f85; font-size: 20px; cursor: pointer;">Menú Datos de {{$Nombre}} {{$Apellido}}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div id='div_media'>
                        <nav>
                            <ul id='menu'>
                                <?php if ($Genero == 'F') { ?>
                                    <a style=" outline:none;" href="{{ route('VerAntecedenteGinecologico',$idExp) }}"><button id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Ginecológico</label></button></a>
                                <?php  } ?>
                                {!! Form::open(['method' => 'GET','route' => ['index', $idExp, 'q' ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Quirúrgicos</label></button></a>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'GET','route' => ['index', $idExp, 't' ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Traumáticos</label></button></a>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'GET','route' => ['indexConsulta', $idExp, 't' ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Consultas</label></button></a>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'POST','route' => ['indexPS', $idExp ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Personal y Social</label></button></a>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'POST','route' => ['indexNP', $idExp ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">No Patológicos</label></button></a>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'POST','route' => ['indexP', $idExp ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Patológicos</label></button></a>
                                {!! Form::close() !!}

                                {!! Form::open(['method' => 'POST','route' => ['indexHF', $idExp ],'style'=>'display:inline']) !!}
                                <a style=" outline:none;"><button type="submit" id="Button1" onmouseout="CambiarColor(this)" onmouseover="CambiarColor(this)" class="Button1" onclick="CambiarColor(this)"><i style="outline:none; color: #209f85;" class="far fa-file-alt"></i><br><label class="textocool">Heredo Familiares</label></button></a>
                                {!! Form::close() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection