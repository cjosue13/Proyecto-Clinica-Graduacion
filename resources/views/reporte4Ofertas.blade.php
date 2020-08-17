<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Reporte 4</title>
</head>

<body>
    <div class="container">
        <img style="float: left;" src="img/company.png">
        <h2 style='position: relative; text-align: center;'>Ofertas</h2>
        <table class="table table-bordered" style="padding-top: 60px; text-align:left; margin-left:0px; ">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Sueldo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Categoria</th>
                <th scope="col">Horario</th>
                <th scope="col">FechaInicio</th>
                <th scope="col">FechaFinal</th>
                <th scope="col">Vacantes</th>
                <th scope="col">Empresa</th>
            </tr>
            @foreach ($ofertas as $key => $value)
            <tr>
                <td>{{ $value->ofNombre }}</td>
                <td>{{ $value->ofUbicacion }}</td>
                <td>{{ $value->ofSueldo }}</td>
                <td>{{ $value->ofDescripcion }}</td>
                <td>{{ $value->ofCategoria  }}</td>
                <td>{{ $value->ofHorario }}</td>
                <td>{{ $value->ofFechaInicio }}</td>
                <td>{{ $value->ofFechaFinal }}</td>
                <td>{{ $value->ofVacantes }}</td>
                <td>{{ $value->ofEmpresa  }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>