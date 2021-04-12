<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_exmsistemasdigestivos;
use Illuminate\Support\Facades\DB;


class exmDigestivoController extends Controller
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
    public function indexEDIS($exm_id)
    {
        $exmsistemasdigestivos = DB::table('tbl_exmsistemasdigestivos')
            ->join('tbl_sistemadigestivos', 'tbl_exmsistemasdigestivos.exSg_fkSistemaDigestivo', '=', 'tbl_sistemadigestivos.sd_id')
            ->where('tbl_exmsistemasdigestivos.exSg_examenClinco', $exm_id)
            ->select('tbl_exmsistemasdigestivos.*')
            ->select(
                'exSg_id',
                'exSg_examenClinco',
                'exSg_fkSistemaDigestivo',
                'exSg_Descripcion',
                'tbl_sistemadigestivos.sg_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasdigestivos.index', compact('exmsistemasdigestivos', 'exm_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEDIS($exm_id)
    {
        $digestivos = DB::table('tbl_sistemadigestivos')
            ->select(
                'sd_id',
                'sg_nombre'
            )
            ->get()->toArray();
        return view('exmsistemasdigestivos.create', compact('exm_id', 'digestivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEDIS(Request $request, $exm_id)
    {
        $this->validate($request, [
            'exSg_fkSistemaDigestivo' => 'required|int',
            'exSg_Descripcion' => 'required|string'
        ]);

        tbl_exmsistemasdigestivos::create(['exSg_examenClinco' => $exm_id] + $request->all());

        $exmsistemasdigestivos = DB::table('tbl_exmsistemasdigestivos')
            ->join('tbl_sistemadigestivos', 'tbl_exmsistemasdigestivos.exSg_fkSistemaDigestivo', '=', 'tbl_sistemadigestivos.sd_id')
            ->where('tbl_exmsistemasdigestivos.exSg_examenClinco', $exm_id)
            ->select('tbl_exmsistemasdigestivos.*')
            ->select(
                'exSg_id',
                'exSg_examenClinco',
                'exSg_fkSistemaDigestivo',
                'exSg_Descripcion',
                'tbl_sistemadigestivos.sg_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasdigestivos.index', compact('exmsistemasdigestivos', 'exm_id'))->with('success', 'Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEDIS($id, $exm_id)
    {
        $digestivos = DB::table('tbl_sistemadigestivos')
            ->select(
                'sd_id',
                'sg_nombre'
            )
            ->get()->toArray();
        $exmsistemasdigestivos = tbl_exmsistemasdigestivos::find($id);
        return view('exmsistemasdigestivos.edit', compact('exmsistemasdigestivos', 'exm_id', 'digestivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEDIS(Request $request, $id, $exm_id)
    {
        $this->validate($request, [
            'exSg_fkSistemaDigestivo' => 'required|int',
            'exSg_Descripcion' => 'required|string'
        ]);

        tbl_exmsistemasdigestivos::find($id)->update($request->all());

        $exmsistemasdigestivos = DB::table('tbl_exmsistemasdigestivos')
            ->join('tbl_sistemadigestivos', 'tbl_exmsistemasdigestivos.exSg_fkSistemaDigestivo', '=', 'tbl_sistemadigestivos.sd_id')
            ->where('tbl_exmsistemasdigestivos.exSg_examenClinco', $exm_id)
            ->select('tbl_exmsistemasdigestivos.*')
            ->select(
                'exSg_id',
                'exSg_examenClinco',
                'exSg_fkSistemaDigestivo',
                'exSg_Descripcion',
                'tbl_sistemadigestivos.sg_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasdigestivos.index', compact('exmsistemasdigestivos', 'exm_id'))
            ->with('success', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEDIS($id, $exm_id)
    {
        tbl_exmsistemasdigestivos::find($id)->delete();

        $exmsistemasdigestivos = DB::table('tbl_exmsistemasdigestivos')
            ->join('tbl_sistemadigestivos', 'tbl_exmsistemasdigestivos.exSg_fkSistemaDigestivo', '=', 'tbl_sistemadigestivos.sd_id')
            ->where('tbl_exmsistemasdigestivos.exSg_examenClinco', $exm_id)
            ->select('tbl_exmsistemasdigestivos.*')
            ->select(
                'exSg_id',
                'exSg_examenClinco',
                'exSg_fkSistemaDigestivo',
                'exSg_Descripcion',
                'tbl_sistemadigestivos.sg_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasdigestivos.index', compact('exmsistemasdigestivos', 'exm_id'))
            ->with('success', 'Datos actualizados con éxito');
    }
}
