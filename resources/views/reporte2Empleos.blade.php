<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@0.15.8/dist/bootstrap-vue.css" crossorigin="anonymous">
    <title>Reporte 4</title>
</head>

<body>
    <div class="container">
    <img style="float: left;" src="img/company.png">
        <h2 style='position: relative; text-align: center;'>Empleos</h2>
        <table class="table table-bordered" style="padding-top: 60px; text-align:left; margin-left:0px; ">
            <tr>
                <td scope="col" style="font-size: 12px;">Categoria</td>
                <td scope="col" style="font-size: 12px;" >Nombre</td>
                <td scope="col" style="font-size: 12px;" >Ubicacion</td>
                <td scope="col" style="font-size: 12px;" >Sueldo</td>
                <td scope="col" style="font-size: 12px;" >Descripcion</td>
                <td scope="col" style="font-size: 12px;" >Horario</td>
                <td scope="col" style="font-size: 12px;" >FechaInicio</td>
                <td scope="col" style="font-size: 12px;" >FechaFinal</td>
                <td scope="col" style="font-size: 12px;" >Vacantes</td>
                <td scope="col" style="font-size: 12px;" >Empresa</td>
            </tr>
            @foreach ($ofertas as $key => $value)
            <tr>
                <td style="font-size: 12px;" >{{ $value->ofCategoria  }}</td>
                <td style="font-size: 12px;">{{ $value->ofNombre }}</td>
                <td style="font-size: 12px;">{{ $value->ofUbicacion }}</td>
                <td style="font-size: 12px;">{{ $value->ofSueldo }}</td>
                <td style="font-size: 12px;">{{ $value->ofDescripcion }}</td>
                <td style="font-size: 12px;">{{ $value->ofHorario }}</td>
                <td style="font-size: 12px;">{{ $value->ofFechaInicio }}</td>
                <td style="font-size: 12px;">{{ $value->ofFechaFinal }}</td>
                <td style="font-size: 12px;">{{ $value->ofVacantes }}</td>
                <td style="font-size: 12px;">{{ $value->ofEmpresa  }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>