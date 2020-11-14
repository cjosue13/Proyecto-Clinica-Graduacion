<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes_antecedecentes;
use Illuminate\Support\Facades\DB;

class antNoPatologicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexNP($idExp)
    {
        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedecentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedecentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNP($idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'N')->get()->toArray();
        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedecentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedecentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        return view('antNoPatologicos.create', compact('idExp','enfermedades','antNoPatologicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNP(Request $request,$idExp)
    {
        
        $this->validate($request, [
            'ea_Descripcion' => 'required|string|max:1000',
            'ea_enfermedad' => 'required|int',
            ]);
        tbl_expedientes_antecedecentes::create($request->all()+['ea_expediente' => $idExp]);

        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedecentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedecentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();

        //return redirect()->route('antNoPatologicos.indexNP')->with('success','Antecedente creado con éxito')->with(compact('idExp','antNoPatologicos'));
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antNoPatologicos = tbl_expedientes_antecedecentes::find($id);
        return view('antNoPatologicos.show', compact('antNoPatologicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNP($id, $idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'N')->get()->toArray();
        $antNoPatologicos = tbl_expedientes_antecedecentes::find($id);
        return view('antNoPatologicos.edit', compact('antNoPatologicos','idExp','enfermedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNP(Request $request, $id, $idExp)
    {
        $this->validate($request, [
            'ea_Descripcion' => 'required|string|max:1000',
            'ea_enfermedad' => 'required|int',
        ]);
        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedecentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedecentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        tbl_expedientes_antecedecentes::find($id)->update($request->all());
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos'))->with('success','Antecedente Eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNP($id,$idExp)
    {
        tbl_expedientes_antecedecentes::find($id)->delete();
        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedecentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedecentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        //return redirect()->route('antNoPatologicos.index')->with('success','Antecedente Eliminado');
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos'))->with('success','Antecedente Eliminado');
    }
}
