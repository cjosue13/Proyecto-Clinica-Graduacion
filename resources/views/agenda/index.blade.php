@extends('layouts.app')
@section('PageTitle', 'Agenda')
@section('content')

<div id='calendar'></div>

<div id="agenda_modal" class="modal" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agendar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_agenda">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" id="agn_fecha" name="agn_fecha">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Hora Inicial</label>
                                <input type="time" class="form-control" id="agn_HoraInicio"  name="agn_HoraInicio">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tiempo (minutos)</label>
                                <input type="number" class="form-control" id="agn_HoraFinal_tiempo" name="agn_HoraFinal_tiempo" >
                            </div>
                        </div>
                    </div>
                    <div row="input-group">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Nombre Completo</label>
                                <input type="text" class="form-control" id="agn_NombreCompleto" name="agn_NombreCompleto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" id="agn_telefono" name="agn_telefono">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <textarea class="form-control" id="agn_descripcion" cols="20" rows="10" name="agn_descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button onclick="guardar()" type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('body')

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var es = {
            code: "es",
            week: {
                dow: 1, // Monday is the first day of the week.
                doy: 4 // The week that contains Jan 4th is the first week of the year.
            },
            buttonText: {
                prev: "Ant",
                next: "Sig",
                today: "Hoy",
                month: "Mes",
                week: "Semana",
                day: "Día",
                list: "Agenda"
            },
            weekText: "Sm",
            allDayText: "Todo el día",
            moreLinkText: "más",
            noEventsText: "No hay eventos para mostrar"
        };

        var calendar = new FullCalendar.Calendar(calendarEl, {
            /*plugins: ['momentTimezone'],
            timeZone: 'America/Costa_Rica',*/
            locale: es,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                let fechaConFomato = moment(arg.start).format("YYYY-MM-DD"); //para convertirlo
                let horaInicial = moment(arg.start).format("HH:mm:ss");
                console.log(horaInicial + "hora inicial");
                let horaFinal = moment(arg.end).format("HH:mm:ss");
                console.log(horaFinal);
                console.log(fechaConFomato);
                $("#agn_fecha").val(fechaConFomato);
                $("#agn_HoraInicio").val(horaInicial);
                $("#agn_HoraFinal_horafinal").val(horaFinal);
                $("#agenda_modal").modal();
                calendar.unselect()
            },
            eventClick: function(arg) {
                if (confirm('Are you sure you want to delete this event?')) {
                    arg.event.remove()
                }
            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [{
                title: 'All Day Event',
                start: '2020-06-01'
            }]
        });

        calendar.render();
    })

    function guardar() {

        var fd = new FormData(document.getElementById("formulario_agenda"));
        var fecha = $("#agn_fecha").val();
        var hora = $("#agn_HoraInicio").val();
        var tiempo = $("#agn_HoraFinal_tiempo").val(); 

        var hora_inicial = moment(fecha + " " + hora).format('HH:mm:ss');//le agrega el formato
        var hora_final = moment(fecha + " " + hora).add(tiempo, 'm').format('HH:mm:ss');//suma el tiempo
        
        fd.append("agn_HoraInicio", hora_inicial);
        fd.append("agn_HoraFinal", hora_final);

        $.ajax({
            url: "/agenda/guardar",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false
        });


    }
</script>

<style>
    body {
        margin: 40px 10px;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 1100px;
        margin: 0 auto;
    }
</style>