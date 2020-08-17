<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <title>Reporte 5</title>
</head>

<body>
    
    <br /><br />
    <div id="reportPage">
        <div id="chartContainer" style="width: 80%;float: left;">
            <canvas id="myChart">
            </canvas>
        </div>

        <div style="display: none; width: 1%; float: left;">
            <canvas id="myChart2"></canvas>
        </div>
        <br /><br /><br />
        <div style="display: none; width: 1%; height: 400px; clear: both;">
            <canvas id="myChart3" style="width: 40%"></canvas>
        </div>
        <a href="#" id="downloadPdf">Descargar Como PDF</a>
    </div>
    <script>
        var chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(231,233,237)'
        };
        var data = {
            labels:[
            @foreach ($empresas as $key => $value)
                "{{$value->name}}",
            @endforeach
            ],
            
            datasets: [{
                label: 'Vacantes',
                backgroundColor: [
                    chartColors.green,
                    chartColors.blue,
                ],
                data: [
                    @foreach ($empresas as $key => $value)
                        "{{ $value->vacantes }}",
                    @endforeach
                ]
            }]
        };

        var myBar = new Chart(document.getElementById("myChart"), {
            type: 'horizontalBar',
            data: data,
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "Empresas vs Vacantes"
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        $('#downloadPdf').click(function(event) {
            // el tamaño del reporte
            var reportPageHeight = 1280;
            var reportPageWidth = 900;

            var pdfCanvas = $('<canvas/>').attr({
                id: "canvaspdf",
                width: reportPageWidth,
                height: reportPageHeight
            });

            // posición de los canvas
            var pdfctx = $(pdfCanvas)[0].getContext('2d');
            var pdfctxX = 0;
            var pdfctxY = 0;
            var buffer = 100;

            // for each chart.js chart
            $("canvas").each(function(index) {
                // obtieene el tamaño de los canvas
                var canvasHeight = $(this).innerHeight();
                var canvasWidth = $(this).innerWidth();

                // dibuja el chart dentro de los nuevos canvas
                pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
                pdfctxX += canvasWidth + buffer;

                // nuestra página de reporte es un patrón de un grid entonces replicamos eso en nuestros nuevos canvas
                if (index % 2 === 1) {
                    pdfctxX = 0;
                    pdfctxY += canvasHeight + buffer;
                }
            });

            // crea un pdf y agrega nuestro nuevo canvas como una imagen
            var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
            pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);

            // descarga el pdf
            pdf.save('EmpresasVSvacantes.pdf');
        });
    </script>
</body>

</html>