<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@0.15.8/dist/bootstrap-vue.css" crossorigin="anonymous">

    <title>Reporte de consultas</title>
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>

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
                        <h2>Informacion sobre la consulta</h2>
                    </div>
                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de consulta : </strong>
                    {{ $consulta->c_Fecha}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora de Consulta : </strong>
                    {{ $consulta->c_Hora}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo de examen : </strong>
                    <?php if ($consulta->c_tipo == "F") { ?>
                        Fisico
                    <?php } else if ($consulta->c_tipo == "P") { ?>
                        Psiquico
                    <?php } else if ($consulta->c_tipo == "G") { ?>
                        General
                    <?php } ?>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Motivo : </strong>
                    {{ $consulta->c_motivo }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diagnostico : </strong>
                    {{ $consulta->c_Diagnostico}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Problemas : </strong>
                    {{ $consulta->c_Problemas}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Historia del Padecimiento : </strong>
                    {{ $consulta->c_HistoriaPadecimientoAct}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Indicaciones : </strong>
                    {{ $consulta->c_indicaciones }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Recomendaciones : </strong>
                    {{ $consulta->c_recomendaciones}}
                </div>
            </div>
        </main>
    </div>
</body>


</html>