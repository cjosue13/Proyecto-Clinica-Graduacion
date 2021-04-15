<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@0.15.8/dist/bootstrap-vue.css" crossorigin="anonymous">

    <title>Reporte de examenes</title>
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
                    <img border="0" style="float: right; margin: 0px 0px 15px 15px; width: 46px; height: 46px;" src="https://i.ibb.co/FBqQz2b/electrocardiograma.png" width="100" />
                </a>
            </div>
        </nav>

        <main class="py-4">
            <div>
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Informacion sobre examen clinico</h2>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de Examen : </strong>
                    {{ $examen->exmm_Nombre}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion de Examen : </strong>
                    {{ $examen->exmm_Descripcion}}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Imagen de Examen : </strong>
                </div>
            </div>

            <br>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">   
                    <img src="../public/images/{{$examen->exmm_Imagen}}" width="200">
                </div>
            </div>
        </main>
    </div>
</body>


</html>