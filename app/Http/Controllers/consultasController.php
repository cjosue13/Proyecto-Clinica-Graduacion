<?php

namespace App\Http\Controllers;

use App\tbl_consultas;
use Illuminate\Http\Request;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class consultasController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idExp)
    {
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        $consultas = DB::table('tbl_consultas')->where('tbl_consultas.c_fkExpediente', $expediente[0]->exp_id)->orderBy('c_id', 'desc')->get()->toArray();

        return view('consultas.index', compact('consultas', 'paciente', 'expediente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idExp)
    {
        return view('consultas.create', compact('idExp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idExp)
    {

        $this->validate($request, [
            'c_HistoriaPadecimientoAct' => 'required|string|max:1000',
            'c_motivo' => 'required|string|max:1000',
            'c_sintomaPsiquico' => 'required|string|max:1000',
            'c_Diagnostico' => 'required|string|max:1000',
            'c_Problemas' => 'required|string|max:1000',
            'c_indicaciones' => 'required|string|max:1000',
            'c_recomendaciones' => 'required|string|max:1000',
            'c_tipo' => 'required|string|max:1',
            'c_Fecha' => 'required|date|before_or_equal:today',
            'c_Acompanante' => 'required|string|max:100'
        ]);

        tbl_consultas::create(['c_fkExpediente' => $idExp] + $request->all());

        $consultas = tbl_consultas::all();
        $consulta = $consultas->last();


        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        $consultas = DB::table('tbl_consultas')->where('tbl_consultas.c_fkExpediente', $expediente[0]->exp_id)->orderBy('c_id', 'desc')->get()->toArray();

        return view('consultas.index', compact('consultas', 'paciente', 'expediente', 'consulta'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $consulta = tbl_consultas::find($id);
        return view('consultas.show', compact('consulta'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $idExp)
    {

        $consulta = tbl_consultas::find($id);
        return view('consultas.edit', compact('consulta', 'idExp'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idExp)
    {
        $this->validate($request, [
            'c_HistoriaPadecimientoAct' => 'required|string|max:1000',
            'c_motivo' => 'required|string|max:1000',
            'c_sintomaPsiquico' => 'required|string|max:1000',
            'c_Diagnostico' => 'required|string|max:1000',
            'c_Problemas' => 'required|string|max:1000',
            'c_indicaciones' => 'required|string|max:1000',
            'c_recomendaciones' => 'required|string|max:1000',
            'c_tipo' => 'required|string|max:1',
            'c_Fecha' => 'required|date|before_or_equal:today',
            'c_Acompanante' => 'required|string|max:100'
        ]);

        tbl_consultas::find($id)->update($request->all());

        return redirect()->route('indexConsulta', $idExp)->with('success', 'Consulta actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $idExp)
    {
        tbl_consultas::find($id)->delete();

        return redirect()->route('indexConsulta', $idExp)->with('success', 'Consulta eliminada con éxito');
    }

    public function MenuAntecedentes($idExp, $Genero)
    {
        return view('MenuAntecedentes', compact('idExp', 'Genero'));
    }

    public function createPDF($id)
    {
        // retreive all records from db
        $consulta = tbl_consultas::find($id);;

        // share data to view
        view()->share('consulta', $consulta);
        $pdf = PDF::loadView('reporteConsulta');

        // download PDF file with download method
        return $pdf->stream();
    }

    public function downloadPDF($id)
    {
        // retreive all records from db
        $consulta = tbl_consultas::find($id);;

        // share data to view
        view()->share('consulta', $consulta);
        $pdf = PDF::loadView('reporteConsulta');

        // download PDF file with download method
        return $pdf->download('consulta' . $consulta->c_id . 'pdf');
    }
}
