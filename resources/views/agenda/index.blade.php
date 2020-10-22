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
            <div class="modal-body-lg">
                <form id="formulario_agenda">
                    @csrf
                    <div class="input-group">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" id="agn_fecha" name="agn_fecha">
                            </div>
                        </div>

                    </div>
                    <div class="input-group">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Hora Inicial</label>
                                <input type="time" class="form-control" id="agn_HoraInicio" name="agn_HoraInicio">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tiempo (minutos)</label>
                                <input type="number" class="form-control" id="agn_HoraFinal_tiempo" name="agn_HoraFinal_tiempo">
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
                    <div class="input-group">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <textarea class="form-control" id="agn_descripcion" cols="20" rows="5" name="agn_descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="limpiar()" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button onclick="Eliminar()" type="button" class="btn btn-danger">Eliminar</button>
                <button onclick="guardar()" type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('body')

@endsection


<script>
    var ID = null;
    var FechaAnt = null;
    var NombreCompletoAnt = null;
    var telefonoAnt = null;
    var horaInicioAnt = null;
    var tiempoAnt = null;
    var descripcionAnt = null;

    var calendar = null;
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

        calendar = new FullCalendar.Calendar(calendarEl, {
            /*plugins: ['momentTimezone'],
            timeZone: 'America/Costa_Rica',*/
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
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

                let horaFinal = moment(arg.end).format("HH:mm:ss");
                //valores por defecto
                $("#agn_fecha").val(fechaConFomato);
                $("#agn_HoraInicio").val(horaInicial);
                $("#agn_HoraFinal_tiempo").val("30");
                $("#agenda_modal").modal();
                calendar.unselect()
            },
            eventClick: function(info) {
                console.log(info.event.extendedProps);
                $("#agenda_modal").modal();
                $("#agn_fecha").val(moment(info.event.extendedProps['agn_fecha']).format("YYYY-MM-DD"));
                FechaAnt = moment(info.event.extendedProps['agn_fecha']).format("YYYY-MM-DD");
                $("#agn_NombreCompleto").val(info.event.extendedProps['agn_NombreCompleto']);
                NombreCompletoAnt = info.event.extendedProps['agn_NombreCompleto'];
                $("#agn_telefono").val(info.event.extendedProps['agn_telefono']);
                telefonoAnt = info.event.extendedProps['agn_telefono'];
                $("#agn_descripcion").val(info.event.extendedProps['agn_descripcion']);
                descripcionAnt = info.event.extendedProps['agn_descripcion'];
                $("#agn_HoraFinal_tiempo").val(info.event.extendedProps['agn_Tiempo']);
                tiempoAnt = info.event.extendedProps['agn_Tiempo'];
                $("#agn_HoraInicio").val(info.event.extendedProps['agn_HoraInicio']);
                horaInicioAnt = info.event.extendedProps['agn_HoraInicio'];
                ID = info.event.id;
            },
            /*
                        eventClick: function(arg) {
                            if (confirm('Are you sure you want to delete this event?')) {
                                arg.event.remove()
                            }
                        },*/
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: {
                url: '/agenda/listar',
                method: 'GET',
                failure: function() {
                    alert('Hubo un error mientras se cargaban los eventos');
                }
            }
        });

        calendar.render();
    })

    function guardar() {
        var fd = new FormData(document.getElementById("formulario_agenda"));
        var fecha = $("#agn_fecha").val();
        var hora = $("#agn_HoraInicio").val();
        var tiempo = $("#agn_HoraFinal_tiempo").val();
        var hora_inicial = moment(fecha + " " + hora).format('HH:mm:ss'); //le agrega el formato
        var hora_final = moment(fecha + " " + hora).add(tiempo, 'm').format('HH:mm:ss'); //suma el tiempo
        fd.append("agn_Tiempo", tiempo);
        fd.append("agn_HoraInicio", hora_inicial);
        fd.append("agn_HoraFinal", hora_final);
        if (ID != null) {
            fd.append("agn_id", ID);
            //datos anteriores
            fd.append("agn_HoraInicioAnt", horaInicioAnt);
            fd.append("agn_NombreCompletoAnt", NombreCompletoAnt);
            fd.append("agn_fechaAnt", FechaAnt);
            fd.append("agn_telefonoAnt", telefonoAnt);
            fd.append("agn_descripcionAnt", descripcionAnt);
            fd.append("agn_TiempoAnt", tiempoAnt);
        }

        //enviamos por ajax
        $.ajax({
            url: (ID == null) ? "/agenda/guardar" : "/agenda/editar", //si ID es nulo entonces guardamos, sino, editamos
            type: "POST",
            data: fd,
            processData: false,
            contentType: false
        }).done(function(respuesta) {
            if (respuesta && respuesta.ok) {
                calendar.refetchEvents();
                /*alert("Se registró la cita en la agenda");*/
                limpiar();
            } else {
                alert("La agenda ya contiene la fecha seleccionada");
            }
        });

    }

    function limpiar() {
        $("#agenda_modal").modal('hide');
        $("#agn_HoraInicio").val("");
        $("#agn_HoraFinal_tiempo").val("");
        $("#agn_NombreCompleto").val("");
        $("#agn_telefono").val("");
        $("#agn_descripcion").val("");
        ID = null;
        horaInicioAnt = null;
        NombreCompletoAnt = null;
        FechaAnt = null;
        telefonoAnt = null;
        descripcionAnt = null;
        tiempoAnt = null;
    }

    function Eliminar() {
        var fd = new FormData(document.getElementById("formulario_agenda"));
        if (ID != null) {
            fd.append("agn_id", ID);
            //enviamos por ajax
            $.ajax({
                url: "/agenda/eliminar",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false
            }).done(function(respuesta) {
                if (respuesta && respuesta.ok) {
                    calendar.refetchEvents();
                    alert("Se eliminó la cita correctamente");
                    limpiar();
                } else {
                    alert("No se ha podido eliminar la cita");
                }
            });
        }
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