<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes_antecedecentes;
use Illuminate\Support\Facades\DB;

class antPatologicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexP($idExp)
    {
        $antPatologicos = DB::table('tbl_expedientes_antecedentes')
            ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
            ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
            ->where('tbl_antenfermedades.atpnp_tipo', 'P')
            ->select(
                'ea_id',
                'ea_expediente',
                'ea_enfermedad',
                'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                'ea_Descripcion',
            )->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antPatologicos.index', compact('idExp', 'antPatologicos', 'paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createP($idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'P')->get()->toArray();
        return view('antPatologicos.create', compact('idExp', 'enfermedades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeP(Request $request, $idExp)
    {

        $this->validate($request, [
            'ea_Descripcion' => 'required|string|max:1000',
            'ea_enfermedad' => 'required|int',
        ]);
        tbl_expedientes_antecedecentes::create($request->all() + ['ea_expediente' => $idExp]);
        $antPatologicos = DB::table('tbl_expedientes_antecedentes')
            ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
            ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
            ->where('tbl_antenfermedades.atpnp_tipo', 'P')
            ->select(
                'ea_id',
                'ea_expediente',
                'ea_enfermedad',
                'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                'ea_Descripcion',
            )->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antPatologicos.index', compact('idExp', 'antPatologicos', 'paciente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antPatologicos = tbl_expedientes_antecedecentes::find($id);
        return view('antPatologicos.show', compact('antPatologicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editP($id, $idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'P')->get()->toArray();
        $antPatologicos = tbl_expedientes_antecedecentes::find($id);
        return view('antPatologicos.edit', compact('antPatologicos', 'idExp', 'enfermedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateP(Request $request, $id, $idExp)
    {
        $this->validate($request, [
            'ea_Descripcion' => 'required|string|max:1000',
            'ea_enfermedad' => 'required|int',
        ]);
        tbl_expedientes_antecedecentes::find($id)->update($request->all());
        $antPatologicos = DB::table('tbl_expedientes_antecedentes')
            ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
            ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
            ->where('tbl_antenfermedades.atpnp_tipo', 'P')
            ->select(
                'ea_id',
                'ea_expediente',
                'ea_enfermedad',
                'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                'ea_Descripcion',
            )->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antPatologicos.index', compact('idExp', 'antPatologicos', 'paciente'))->with('success', 'Antecedente Eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteP($id, $idExp)
    {
        tbl_expedientes_antecedecentes::find($id)->delete();
        $antPatologicos = DB::table('tbl_expedientes_antecedentes')
            ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
            ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
            ->where('tbl_antenfermedades.atpnp_tipo', 'P')
            ->select(
                'ea_id',
                'ea_expediente',
                'ea_enfermedad',
                'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                'ea_Descripcion',
            )->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antPatologicos.index', compact('idExp', 'antPatologicos','paciente'))->with('success', 'Antecedente Eliminado');
    }
}
