<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_heredofamiliares_expedientes;
use Illuminate\Support\Facades\DB;

class antHeredoFamiliaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHF($idExp)
    {
        $antHeredoFamiliares = DB::table('tbl_heredofamiliares_expedientes')
                ->join('tbl_antenfermedades', 'tbl_heredofamiliares_expedientes.he_enfermedad_fk', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_heredofamiliares_expedientes.exp_fk', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'P')
                ->select(
                    'he_id',
                    'exp_fk',
                    'he_Parentesco',
                    'he_Descripcion',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                )->get()->toArray();
        return view('antHeredoFamiliares.index', compact('idExp','antHeredoFamiliares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createHF($idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'P')->get()->toArray();
        return view('antHeredoFamiliares.create', compact('idExp','enfermedades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeHF(Request $request,$idExp)
    {
        
        $this->validate($request, [
            'he_Descripcion' => 'required|string|max:50',
            ]);
        tbl_heredofamiliares_expedientes::create($request->all()+['exp_fk' => $idExp]);

        $antHeredoFamiliares = DB::table('tbl_heredofamiliares_expedientes')
                ->join('tbl_antenfermedades', 'tbl_heredofamiliares_expedientes.he_enfermedad_fk', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_heredofamiliares_expedientes.exp_fk', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'P')
                ->select(
                    'he_id',
                    'exp_fk',
                    'he_Parentesco',
                    'he_Descripcion',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                )->get()->toArray();

        //return redirect()->route('antHeredoFamiliares.indexHF')->with('success','Antecedente creado con éxito')->with(compact('idExp','antHeredoFamiliares'));
        return view('antHeredoFamiliares.index', compact('idExp','antHeredoFamiliares'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antHeredoFamiliares = tbl_heredofamiliares_expedientes::find($id);
        return view('antHeredoFamiliares.show', compact('antHeredoFamiliares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editHF($id, $idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'P')->get()->toArray();
        $antHeredoFamiliares = tbl_heredofamiliares_expedientes::find($id);
        return view('antHeredoFamiliares.edit', compact('antHeredoFamiliares','idExp','enfermedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHF(Request $request, $id, $idExp)
    {
        $this->validate($request, [
            'he_Descripcion' => 'required|string|max:50',
            ]);
        $antHeredoFamiliares = DB::table('tbl_heredofamiliares_expedientes')
                ->join('tbl_antenfermedades', 'tbl_heredofamiliares_expedientes.he_enfermedad_fk', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_heredofamiliares_expedientes.exp_fk', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'P')
                ->select(
                    'he_id',
                    'exp_fk',
                    'he_Parentesco',
                    'he_Descripcion',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                )->get()->toArray();
        tbl_heredofamiliares_expedientes::find($id)->update($request->all());
        return view('antHeredoFamiliares.index', compact('idExp','antHeredoFamiliares'))->with('success','Antecedente Eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteHF($id,$idExp)
    {
        tbl_heredofamiliares_expedientes::find($id)->delete();
        $antHeredoFamiliares = DB::table('tbl_heredofamiliares_expedientes')
                ->join('tbl_antenfermedades', 'tbl_heredofamiliares_expedientes.he_enfermedad_fk', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_heredofamiliares_expedientes.exp_fk', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'P')
                ->select(
                    'he_id',
                    'exp_fk',
                    'he_Parentesco',
                    'he_Descripcion',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                )->get()->toArray();
        //return redirect()->route('antHeredoFamiliares.index')->with('success','Antecedente Eliminado');
        return view('antHeredoFamiliares.index', compact('idExp','antHeredoFamiliares'))->with('success','Antecedente Eliminado');
    }
}
