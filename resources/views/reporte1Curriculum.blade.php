<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@0.15.8/dist/bootstrap-vue.css" crossorigin="anonymous">
    <title>Reporte 1</title>
    <style>
    body{
      font-family: sans-serif;
    }
  </style>
</head>

<body>
    <div class="container">
        <img style="float: left;" src="img/company.png">
        <h2 style='position: relative; text-align: center;'>Curriculum</h2>
        <h2 style='padding-top: 60px; color: #636b6f;'>Datos Personales</h2>
        <table class="table table-bordered" style=" text-align:center; margin-left:auto; margin-right:auto;">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th>
                <th scope="col">Cedula</th>
                <th scope="col">Foto</th>
            </tr>
            @foreach ($usuarios as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->cedula }}</td>
                <td><img class="imagen" style="width:50px; height:50px;" src="<?php echo ('storage/images/' . $value->photo) ?>"></td>
            </tr>
            @endforeach
        </table>
        <h2 style="color: #636b6f;">Experiencias</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Puesto</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Final</th>
                </tr>
            </thead>
            @foreach ($experiencias as $key => $value)
            <tr>
                <td>{{ $value->exPuesto }}</td>
                <td>{{ $value->exEmpresa }}</td>
                <td>{{ $value->exDescripcion }}</td>
                <td>{{ $value->exFechaInicio }}</td>
                <td>{{ $value->fechaFinal }}</td>
            </tr>
            @endforeach
        </table>
        <h2 style="color: #636b6f;">Formaciones</h2>
        <table class="table table-bordered">
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Institución</th>
                <th scope="col">Fecha</th>
            </tr>
            @foreach ($formaciones as $key => $value)
            <tr>
                <td>{{ $value->foTitulo }}</td>
                <td>{{ $value->foEspecialidad }}</td>
                <td>{{ $value->foInstitucion }}</td>
                <td>{{ $value->foFecha }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>