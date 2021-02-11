<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_apariencias;
use Illuminate\Support\Facades\DB;


class aparecienciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAPAR($exm_id)
    {
        $apariencias = DB::table('tbl_apariencias')
            ->where('tbl_apariencias.apa_examenClinico', $exm_id)
            ->select('tbl_apariencias.*')
            ->get()->toArray();

        return view('apariencias.index', compact('apariencias', 'exm_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAPAR($exm_id)
    {
        return view('apariencias.create', compact('exm_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAPAR(Request $request, $exm_id)
    {
        $this->validate($request, [
            'apa_Piel' => 'required|string',
            'apa_Extremidades' => 'required|string',
            'apa_SignosRespiratorios' => 'required|string',
            'apa_Nasofaringeo' => 'required|string',
        ]);

        tbl_apariencias::create(['apa_examenClinico' => $exm_id] + $request->all());

        $apariencias = DB::table('tbl_apariencias')
            ->where('tbl_apariencias.apa_examenClinico', $exm_id)
            ->select('tbl_apariencias.*')
            ->get()->toArray();

        return view('apariencias.index', compact('apariencias', 'exm_id'))->with('success', 'Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAPAR($id, $exm_id)
    {
        $apariencias = tbl_apariencias::find($id);
        return view('apariencias.edit', compact('apariencias', 'exm_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAPAR(Request $request, $id, $exm_id)
    {
        $this->validate($request, [
            'apa_Piel' => 'required|string',
            'apa_Extremidades' => 'required|string',
            'apa_SignosRespiratorios' => 'required|string',
            'apa_Nasofaringeo' => 'required|string',
        ]);

        tbl_apariencias::find($id)->update($request->all());

        $apariencias = DB::table('tbl_apariencias')
            ->where('tbl_apariencias.apa_examenClinico', $exm_id)
            ->select('tbl_apariencias.*')
            ->get()->toArray();

        return view('apariencias.index', compact('apariencias', 'exm_id'))
            ->with('success', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAPAR($id, $exm_id)
    {
        tbl_apariencias::find($id)->delete();

        $apariencias = DB::table('tbl_apariencias')
            ->where('tbl_apariencias.apa_examenClinico', $exm_id)
            ->select('tbl_apariencias.*')
            ->get()->toArray();

        return view('apariencias.index', compact('apariencias', 'exm_id'))
            ->with('success', 'Datos actualizados con éxito');
    }
}
