<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes_antecedentes;
use Illuminate\Support\Facades\DB;

class antNoPatologicosController extends Controller
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
    public function indexNP($idExp)
    {
        $antNoPatologicos = DB::table('tbl_expedientes_antecedentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
      
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos', 'paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createNP($idExp)
    {
        $enfermedades = DB::table('tbl_antenfermedades')->where('atpnp_tipo', 'N')->get()->toArray();
        return view('antNoPatologicos.create', compact('idExp','enfermedades'));
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
            tbl_expedientes_antecedentes::create($request->all()+['ea_expediente' => $idExp]);

        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        $antNoPatologicos = DB::table('tbl_expedientes_antecedentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        //return redirect()->route('antNoPatologicos.indexNP')->with('success','Antecedente creado con éxito')->with(compact('idExp','antNoPatologicos'));
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos', 'paciente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antNoPatologicos = tbl_expedientes_antecedentes::find($id);
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
        $antNoPatologicos = tbl_expedientes_antecedentes::find($id);
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

        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        tbl_expedientes_antecedentes::find($id)->update($request->all());
        $antNoPatologicos = DB::table('tbl_expedientes_antecedentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos', 'paciente'))->with('success','Antecedente Eliminado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteNP($id,$idExp)
    {
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        tbl_expedientes_antecedentes::find($id)->delete();
        $antNoPatologicos = DB::table('tbl_expedientes_antecedentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedentes.ea_expediente', $idExp)
                ->where('tbl_antenfermedades.atpnp_tipo', 'N')
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'ea_enfermedad',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        return view('antNoPatologicos.index', compact('idExp','antNoPatologicos','paciente'))->with('success','Antecedente Eliminado');
    }
}
