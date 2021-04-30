<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_examenesclinicos;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;


class examenesclinicosController extends Controller
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
    public function indexEC($idCon, $idExp)
    {
        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();
        return view('examenesclinicos.index', compact('examenesclinicos','idCon','idExp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEC($idCon, $idExp)
    {
        return view('examenesclinicos.create', compact('idCon','idExp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEC(Request $request, $idCon, $idExp)
    {
        
        $this->validate($request, [
            'exm_peso' => 'required|int',
            'exm_altura' => 'required|int',
            'exm_FC' => 'required|int',
            'exm_Temperatura' => 'required|int',
            'exm_sistolica' => 'required|int',
            'exm_diastolica' => 'required|int'
        ]);
        tbl_examenesclinicos::create(['exm_imc' => round(($request['exm_peso']/pow($request['exm_altura'],2))*10000,1)] + ['exm_consulta' => $idCon] + $request->all());

        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();
        return view('examenesclinicos.index', compact('examenesclinicos', 'idCon', 'idExp'))->with('success','Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEC($id, $idCon, $idExp)
    {
        $examenesclinicos = tbl_examenesclinicos::find($id);
        return view('examenesclinicos.edit', compact('examenesclinicos','idCon','idExp'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEC(Request $request, $id, $idCon, $idExp )
    {

        $this->validate($request, [
            'exm_peso' => 'required|int',
            'exm_altura' => 'required|int',
            'exm_FC' => 'required|int',
            'exm_Temperatura' => 'required|int',
            'exm_sistolica' => 'required|int',
            'exm_diastolica' => 'required|int'
        ]);

        tbl_examenesclinicos::find($id)->update(['exm_imc' => round(($request['exm_peso']/pow($request['exm_altura'],2))*10000,1)] + $request->all());

        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();

        return view('examenesclinicos.index', compact('examenesclinicos', 'idCon', 'idExp'))
        ->with('success','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEC($id, $idCon, $idExp)
    {
        tbl_examenesclinicos::find($id)->delete();
        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();

        return view('examenesclinicos.index', compact('examenesclinicos', 'idCon','idExp'))
        ->with('success','Datos actualizados con éxito');
    }
}
