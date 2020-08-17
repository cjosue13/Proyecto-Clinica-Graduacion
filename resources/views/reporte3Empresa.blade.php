<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Reporte 3</title>
</head>

<body>
    <div class="container">
        <img style="float: left;" src="img/company.png">
        <h2 style='position: relative; text-align: center;'>Empresa</h2>
        <table class="table table-bordered" style="padding-top: 60px; text-align:left; margin-left:0px; ">
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
    </div>
</body>

</html>