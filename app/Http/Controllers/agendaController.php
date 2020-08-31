<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_agendas;
use Illuminate\Support\Facades\DB;

class agendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pacientes = DB::table('tbl_pacientes')->orderBy('pac_id', 'asc')->get()->toArray();
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
                "backgroundColor" => $value->agn_estado == 1 ? "#71f587" : "#ff0000",
                "textColor" => "#fff",
                "extendedProps" => [
                    "agn_NombreCompleto" => $value->agn_NombreCompleto,
                    "agn_telefono" => $value->agn_telefono,
                    "agn_fecha" => $value->agn_fecha,
                    "agn_HoraInicio" => $value->agn_HoraInicio,
                    "agn_HoraFinal" => $value->agn_HoraFinal,
                    "agn_estado" => $value->agn_estado,
                    "agn_Tiempo" => $value->agn_Tiempo,
                    "agn_descripcion" => $value->agn_descripcion
                ]
            ];
        }
        return response()->json($nueva_agenda);
    }

    public function validarFecha($fecha, $horaInicial, $horaFinal)
    {
        $agenda = null;
        $agenda = tbl_agendas::select()
            ->whereDate('agn_fecha', $fecha)
            ->whereBetween('agn_HoraInicio', [$horaInicial,  $horaFinal])
            ->whereBetween('agn_HoraFinal', [$horaInicial,  $horaFinal])
            ->first();
        //coja todo lo de al agenda, donde la fecha sea igual a la fecha de hoy, que sea mayor o igual, menor o igual que las horas dadas

        return $agenda == null ? true : false;
        //si no encontró nada, es porque no hay una fecha a esa hora
    }

    public function guardar(Request $request)
    {
        $input = $request->all();
        if ($this->validarFecha($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"])) { //validamos  que no existe una
            $agenda = tbl_agendas::create([
                'agn_NombreCompleto' => $input["agn_NombreCompleto"],
                'agn_telefono' => $input["agn_telefono"],
                'agn_fecha' => $input["agn_fecha"],
                'agn_HoraInicio' => $input["agn_HoraInicio"],
                'agn_HoraFinal' => $input["agn_HoraFinal"],
                'agn_Tiempo' => $input["agn_Tiempo"],
                'agn_descripcion' => $input["agn_descripcion"]
            ]);
            // como estamos haciendo una petición por ajax, la respuesta tiene que ser un json
            return response()->json(["ok" => true]);
        } else {
            return response()->json(["ok" => false]);
        }
    }

    public function editar(Request $request)
    {
        $input = $request->all();
        if (
            $input["agn_fecha"] == $input["agn_fechaAnt"] && $input["agn_HoraInicio"] == $input["agn_HoraInicioAnt"]
            && $input["agn_Tiempo"] == $input["agn_TiempoAnt"] &&
            ($input["agn_NombreCompletoAnt"] != $input["agn_NombreCompleto"] || $input["agn_telefonoAnt"] != $input["agn_telefono"]
                || $input["agn_descripcionAnt"] != $input["agn_descripcion"])
        ) {
            tbl_agendas::find($input["agn_id"])->update($request->all());
            return response()->json(["ok" => true]);
        }
        if ($this->validarFecha($input["agn_fecha"], $input["agn_HoraInicio"], $input["agn_HoraFinal"])) { //validamos  que no existe una
            tbl_agendas::find($input["agn_id"])->update($request->all());
            // como estamos haciendo una petición por ajax, la respuesta tiene que ser un json
            return response()->json(["ok" => true]);
        } else {
            return response()->json(["ok" => false]);
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {

        return view('pacientes.create');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)
    {
        $empresa = auth()->user()->id;
        $this->validate($request, [
            'pac_pNombre' => 'required|string|max:50',
            'pac_sNombre' => 'nullable|string|max:50',
            'pac_pApellido' => 'required|string|max:50',
            'pac_sApellido' => 'required|string|max:50',
            'pac_Cedula' => 'required|string|max:20',
            'pac_Genero' => 'required|string|max:1',
            'pac_FechaNacimiento' => 'required|date|before_or_equal:today',
            'pac_Residencia' => 'required|string|max:400',
            'pac_Correo' => 'required|string|max:50',
            'pac_Profesion_Oficio' => 'required|string|max:50',
            'pac_EstadoCivil' => 'required|string|max:2',
            'pac_Religion' => 'required|string|max:50'
        ]);
        tbl_pacientes::create($request->all());
        return redirect()->route('pacientes.index')->with('success','Paciente creado con éxito');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        $pacientes = tbl_pacientes::find($id);
        return view('pacientes.show', compact('pacientes'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $pacientes = tbl_pacientes::find($id);
        return view('pacientes.edit', compact('pacientes'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pac_pNombre' => 'required|string|max:50',
            'pac_sNombre' => 'nullable|string|max:50',
            'pac_pApellido' => 'required|string|max:50',
            'pac_sApellido' => 'required|string|max:50',
            'pac_Cedula' => 'required|string|max:20',
            'pac_Genero' => 'required|string|max:1',
            'pac_FechaNacimiento' => 'required|date|before_or_equal:today',
            'pac_Residencia' => 'required|string|max:400',
            'pac_Correo' => 'required|string|max:50',
            'pac_Profesion_Oficio' => 'required|string|max:50',
            'pac_EstadoCivil' => 'required|string|max:2',
            'pac_Religion' => 'required|string|max:50'
        ]);
       
        tbl_pacientes::find($id)->update($request->all());
        return redirect()->route('pacientes.index')->with('success','Paciente actualizado con éxito');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        tbl_pacientes::find($id)->delete();
        return redirect()->route('pacientes.index')->with('success','Paciente Eliminado');
    }*/
}
