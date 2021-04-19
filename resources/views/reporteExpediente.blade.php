<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@0.15.8/dist/bootstrap-vue.css" crossorigin="anonymous">
    <title>Reporte de Expediente</title>
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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <img src="../public/img/LOGO 2020.png" style="max-width: 100%;
    height: auto; float: right; margin-top: 50px; width: 180px; height: 150px;">
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div>
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ $pacientes->pac_pApellido . " " . $pacientes->	pac_sApellido. " ".$pacientes->pac_pNombre }}</h2>
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cedula : </strong>
                    {{ $pacientes->pac_Cedula }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Genero : </strong>
                    {{ $pacientes->pac_Genero}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de Nacimiento : </strong>
                    {{ $pacientes->pac_FechaNacimiento}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Residencia : </strong>
                    {{ $pacientes->pac_Residencia}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Correo : </strong>
                    {{ $pacientes->pac_Correo }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Profesion : </strong>
                    {{ $pacientes->pac_Profesion_Oficio}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado Civil : </strong>
                    <?php if ($pacientes->pac_EstadoCivil == "ST") { ?>
                        Soltero
                    <?php } else if ($pacientes->pac_EstadoCivil == "CO") { ?>
                        Comprometido
                    <?php } else if ($pacientes->pac_EstadoCivil == "ER") { ?>
                        En una relación
                    <?php } else if ($pacientes->pac_EstadoCivil == "CA") { ?>
                        Casado
                    <?php } else if ($pacientes->pac_EstadoCivil == "UL") { ?>
                        Unión Libre
                    <?php } else if ($pacientes->pac_EstadoCivil == "SP") { ?>
                        Separado
                    <?php } else if ($pacientes->pac_EstadoCivil == "DV") { ?>
                        Divorciado
                    <?php } else if ($pacientes->pac_EstadoCivil == "VD") { ?>
                        Viudo/Viuda
                    <?php } ?>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Religion : </strong>
                    {{ $pacientes->pac_Religion}}
                </div>
            </div>

            <?php if (sizeof($expediente) > 0) { ?>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Metas : </strong>
                        {{ $expediente[0]->exp_Metas}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Historia Biopatografica : </strong>
                        {{ $expediente[0]->exp_Historiabiopatografica}}
                    </div>
                </div>
            <?php } ?>


        </main>
    </div>
</body>

</html>