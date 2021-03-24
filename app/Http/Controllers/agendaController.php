<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_agendas;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class agendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agenda.index');
    }

    public function listar()
    {
        $agenda = tbl_agendas::all();
        $nueva_agenda = [];
        foreach ($agenda as $value) {
            $nueva_agenda[] = [
                "id" => $value->agn_id,
                "start" => $value->agn_fecha . " " . $value->agn_HoraInicio,
                "end" => $value->agn_fecha . " " . $value->agn_HoraFinal,
                "title" => $value->agn_NombreCompleto . " " . $value->agn_descripcion,
                "backgroundColor" => "#71f587",
                "textColor" => "#fff",
                "extendedProps" => [
                    "agn_NombreCompleto" => $value->agn_NombreCompleto,
                    "agn_telefono" => $value->agn_telefono,
                    "agn_fecha" => $value->agn_fecha,
                    "agn_HoraInicio" => $value->agn_HoraInicio,
                    "agn_HoraFinal" => $value->agn_HoraFinal,
                    "agn_Tiempo" => $value->agn_Tiempo,
                    "agn_descripcion" => $value->agn_descripcion
                ]
            ];
        }
        return response()->json($nueva_agenda);
    }

    public function validarFecha($fecha, $horaInicial, $horaFinal)
    {
        $agenda = tbl_agendas::select()
            ->whereDate('agn_fecha', $fecha)
            ->whereBetween('agn_HoraInicio', [$horaInicial,  $horaFinal])
            ->first();
        //coja todo lo de al agenda, donde la fecha sea igual a la fecha de hoy y haya una fecha con hora de inicio entre el rango de la cita a guardar
        return $agenda == null ? true : false; //si no encontró nada, es porque no hay una fecha a esa hora
    }

    public function validarFecha2($fecha, $horaInicial, $horaFinal)
    {
        $agenda = tbl_agendas::select()
            ->whereDate('agn_fecha', $fecha)
            ->whereBetween('agn_HoraFinal', [$horaInicial,  $horaFinal])
            ->first();
        //coja todo lo de al agenda, donde la fecha sea igual a la fecha de hoy y haya una fecha con hora final entre el rango de la cita a guardar
        return $agenda == null ? true : false; //si no encontró nada, es porque no hay una fecha a esa hora
    }

    public function validarFecha3($fecha, $horaInicial, $horaFinal, $id)
    {
        $agenda = tbl_agendas::select()
            ->where('agn_id', '!=', $id)
            ->whereDate('agn_fecha', $fecha)
            ->whereBetween('agn_HoraInicio', [$horaInicial,  $horaFinal])
            ->first();
        //coja todo lo de al agenda, donde la fecha sea igual a la fecha de hoy, haya una fecha con hora inicial entre el rango de la cita a guardar y que no tome en cuenta a la misma cita
        return $agenda == null ? true : false; //si no encontró nada, es porque no hay una fecha a esa hora
    }

    public function validarFecha4($fecha, $horaInicial, $horaFinal, $id)
    {
        $agenda = tbl_agendas::select()
            ->where('agn_id', '!=', $id)
            ->whereDate('agn_fecha', $fecha)
            ->whereBetween('agn_HoraFinal', [$horaInicial,  $horaFinal])
            ->first();
        //coja todo lo de al agenda, donde la fecha sea igual a la fecha de hoy, haya una fecha con hora final entre el rango de la cita a guardar y que no tome en cuenta a la misma cita
        return $agenda == null ? true : false; //si no encontró nada, es porque no hay una fecha a esa hora
    }

    public function guardar(Request $request)
    {
        $input = $request->all();
        if (
            $this->validarFecha($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"])
            && $this->validarFecha2($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"])
        ) { //validamos  que no existe una
            tbl_agendas::create([
                'agn_NombreCompleto' => $input["agn_NombreCompleto"],
                'agn_telefono' => $input["agn_telefono"],
                'agn_fecha' => $input["agn_fecha"],
                'agn_HoraInicio' => $input["agn_HoraInicio"],
                'agn_HoraFinal' => $input["agn_HoraFinal"],
                'agn_Tiempo' => $input["agn_Tiempo"],
                'agn_descripcion' => $input["agn_descripcion"]
            ]);
            return response()->json(["ok" => true]); // como estamos haciendo una petición por ajax, la respuesta tiene que ser un json
        } else {
            return response()->json(["ok" => false]);
        }
    }

    public function editar(Request $request)
    {
        $input = $request->all();
        if (
            $input["agn_fecha"] == $input["agn_fechaAnt"]
            && $input["agn_HoraInicio"] == $input["agn_HoraInicioAnt"]
            && $input["agn_Tiempo"] == $input["agn_TiempoAnt"]
            && ($input["agn_NombreCompletoAnt"] != $input["agn_NombreCompleto"] || $input["agn_telefonoAnt"] != $input["agn_telefono"]
                || $input["agn_descripcionAnt"] != $input["agn_descripcion"])
        ) { //si solamente se editan los campos que no tienen que ver con horas o fecha
            tbl_agendas::find($input["agn_id"])->update($request->all());
            return response()->json(["ok" => true]);
        }
        if (
            $input["agn_fecha"] == $input["agn_fechaAnt"]
            && $input["agn_HoraInicio"] == $input["agn_HoraInicioAnt"]
            && $input["agn_Tiempo"] != $input["agn_TiempoAnt"]
            && $this->validarFecha3($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"], $input["agn_id"])
        ) { //si se edita el tiempo de hora final
            tbl_agendas::find($input["agn_id"])->update($request->all());
            return response()->json(["ok" => true]);
        }
        if (
            $this->validarFecha3($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"], $input["agn_id"])
            && $this->validarFecha4($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"], $input["agn_id"])
        ) { //validamos  que no existe una cita en el mismo lugar
            tbl_agendas::find($input["agn_id"])->update($request->all());
            return response()->json(["ok" => true]);
        } else {
            return response()->json(["ok" => false]);
        }
        // como estamos haciendo una petición por ajax, la respuesta tiene que ser un json, retornamos este cada vez que sea necesario
    }

    function eliminar(Request $request)
    {
        $input = $request->all();
        tbl_agendas::find($input["agn_id"])->delete();
        return response()->json(["ok" => true]);
        // como estamos haciendo una petición por ajax, la respuesta tiene que ser un json, retornamos este cada vez que sea necesario
    }


    public function createPDF(Request $request)
    {

        $agenda = DB::table('tbl_agendas')
            ->whereBetween('agn_fecha', array($request->input('agn_fecha_inicio'), $request->input('agn_fecha_final')))
            ->get();

        // share data to view
        view()->share('agenda', $agenda);

        $pdf = PDF::loadView('reporteAgenda');

        // download PDF file with download method
        return $pdf->stream();
    }
}
