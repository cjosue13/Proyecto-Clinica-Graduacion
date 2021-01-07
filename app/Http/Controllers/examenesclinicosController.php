<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_examenesclinicos;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;


class examenesclinicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEC($idCon)
    {
        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();
        return view('examenesclinicos.index', compact('examenesclinicos','idCon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEC($idCon)
    {
        return view('examenesclinicos.create', compact('idCon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEC(Request $request, $idCon)
    {
        
        $this->validate($request, [
            'exm_peso' => 'required|float|max:3',
            'exm_altura' => 'required|float|max:3',
            'exm_FC' => 'required|float|max:3',
            'exm_Temperatura' => 'required|float|max:3',
            'exm_sistolica' => 'required|float|max:5',
            'exm_diastolica' => 'required|float|max:5'
        ]);
        tbl_examenesclinicos::create(['exm_imc' => $request['exm_peso']/$request['exm_altura']] + ['exm_consulta' => $idCon] + $request->all());

        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();
        return view('examenesclinicos.index', compact('examenesclinicos', 'idCon'))->with('success','Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEC($id,$idCon)
    {
        $examenesclinicos = tbl_examenesclinicos::find($id);
        return view('examenesclinicos.edit', compact('examenesclinicos','idCon'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEC(Request $request, $id,$idCon)
    {

        $this->validate($request, [
            'exm_peso' => 'required|float|max:3',
            'exm_altura' => 'required|float|max:3',
            'exm_FC' => 'required|float|max:3',
            'exm_Temperatura' => 'required|float|max:3',
            'exm_sistolica' => 'required|float|max:5',
            'exm_diastolica' => 'required|float|max:5'
        ]);

        tbl_examenesclinicos::find($id)->update(['exm_imc' => $request['exm_peso']/$request['exm_altura']] + $request->all());

        $examenesclinicos = DB::table('tbl_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();

        return view('examenesclinicos.index', compact('examenesclinicos', 'idCon'))
        ->with('success','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEC($id, $idCon)
    {
        tbl_examenesclinicos::find($id)->delete();
        $examenes = DB::table('tb_examenesclinicos')->select('tbl_examenesclinicos.*')
        ->where('tbl_examenesclinicos.exm_consulta', $idCon)->get()->toArray();

        return view('examenesclinicos.index', compact('examenesclinicos', 'idCon'))
        ->with('success','Datos actualizados con éxito');
    }
}
