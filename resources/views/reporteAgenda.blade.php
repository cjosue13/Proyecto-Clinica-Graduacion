<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@0.15.8/dist/bootstrap-vue.css" crossorigin="anonymous">
    <title>Reporte de Agenda</title>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<!-- style="border: black 1px solid;"-->

<body>
    <div>

        <nav class="navbar navbar-expand-md navbar-dark bg-green shadow-sm">
            <div style="background-color:#209f85;" style="outline:none">
                <a class="navbar-brand">
                    CLINICA HAHNEMANN
                </a>
            </div>
        </nav>
        <table class="table table-striped" style="padding-top: 60px; text-align:left; margin-left:0px; ">
            <thead class="thead">
                <tr>
                    <th scope="col" style="font-size: 12px;">Nombre Completo</td>
                    <th scope="col" style="font-size: 12px;">Telefono</td>
                    <th scope="col" style="font-size: 12px;">Hora de Cita</td>
                    <th scope="col" style="font-size: 12px;">Fecha</td>
                    <th scope="col" style="font-size: 12px;">Motivo de consulta</td>
                </tr>
                @foreach ($agenda as $key => $value)
                <tr>
                    <td style="font-size: 12px;">{{ $value->agn_NombreCompleto}}</td>
                    <td style="font-size: 12px;">{{ $value->agn_telefono}}</td>
                    <td style="font-size: 12px;">{{ $value->agn_HoraInicio }}</td>
                    <td style="font-size: 12px;">{{ $value->agn_fecha }}</td>
                    <td style="font-size: 12px;">{{ $value->agn_descripcion }}</td>
                </tr>
                @endforeach
        </table>
    </div>
</body>

</html>