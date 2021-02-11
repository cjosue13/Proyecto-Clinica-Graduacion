<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_exmsistemasnerviosos;
use Illuminate\Support\Facades\DB;


class exmNerviosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexESN($exm_id)
    {
        $exmsistemasnerviosos = DB::table('tbl_exmsistemasnerviosos')
            ->join('tbl_sistemanerviosos', 'tbl_exmsistemasnerviosos.exSn_fkSistemaNerviosoC', '=', 'tbl_sistemanerviosos.snc_id')
            ->where('tbl_exmsistemasnerviosos.exSn_examenClinico', $exm_id)
            ->select('tbl_exmsistemasnerviosos.*')
            ->select(
                'exSn_id',
                'exSn_examenClinico',
                'exSn_fkSistemaNerviosoC',
                'exSn_detalle',
                'tbl_sistemanerviosos.snc_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasnerviosos.index', compact('exmsistemasnerviosos', 'exm_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createESN($exm_id)
    {
        $nerviosos = DB::table('tbl_sistemanerviosos')
            ->select(
                'snc_id',
                'snc_nombre'
            )
            ->get()->toArray();
        return view('exmsistemasnerviosos.create', compact('exm_id', 'nerviosos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeESN(Request $request, $exm_id)
    {
        $this->validate($request, [
            'exSn_fkSistemaNerviosoC' => 'required|int',
            'exSn_detalle' => 'required|string'
        ]);

        tbl_exmsistemasnerviosos::create(['exSn_examenClinico' => $exm_id] + $request->all());

        $exmsistemasnerviosos = DB::table('tbl_exmsistemasnerviosos')
            ->join('tbl_sistemanerviosos', 'tbl_exmsistemasnerviosos.exSn_fkSistemaNerviosoC', '=', 'tbl_sistemanerviosos.snc_id')
            ->where('tbl_exmsistemasnerviosos.exSn_examenClinico', $exm_id)
            ->select('tbl_exmsistemasnerviosos.*')
            ->select(
                'exSn_id',
                'exSn_examenClinico',
                'exSn_fkSistemaNerviosoC',
                'exSn_detalle',
                'tbl_sistemanerviosos.snc_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasnerviosos.index', compact('exmsistemasnerviosos', 'exm_id'))->with('success', 'Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editESN($id, $exm_id)
    {
        $nerviosos = DB::table('tbl_sistemanerviosos')
            ->select(
                'snc_id',
                'snc_nombre'
            )
            ->get()->toArray();
        $exmsistemasnerviosos = tbl_exmsistemasnerviosos::find($id);
        return view('exmsistemasnerviosos.edit', compact('exmsistemasnerviosos', 'exm_id', 'nerviosos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateESN(Request $request, $id, $exm_id)
    {
        $this->validate($request, [
            'exSn_fkSistemaNerviosoC' => 'required|int',
            'exSn_detalle' => 'required|string'
        ]);

        tbl_exmsistemasnerviosos::find($id)->update($request->all());

        $exmsistemasnerviosos = DB::table('tbl_exmsistemasnerviosos')
            ->join('tbl_sistemanerviosos', 'tbl_exmsistemasnerviosos.exSn_fkSistemaNerviosoC', '=', 'tbl_sistemanerviosos.snc_id')
            ->where('tbl_exmsistemasnerviosos.exSn_examenClinico', $exm_id)
            ->select('tbl_exmsistemasnerviosos.*')
            ->select(
                'exSn_id',
                'exSn_examenClinico',
                'exSn_fkSistemaNerviosoC',
                'exSn_detalle',
                'tbl_sistemanerviosos.snc_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasnerviosos.index', compact('exmsistemasnerviosos', 'exm_id'))
            ->with('success', 'Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteESN($id, $exm_id)
    {
        tbl_exmsistemasnerviosos::find($id)->delete();

        $exmsistemasnerviosos = DB::table('tbl_exmsistemasnerviosos')
            ->join('tbl_sistemanerviosos', 'tbl_exmsistemasnerviosos.exSn_fkSistemaNerviosoC', '=', 'tbl_sistemanerviosos.snc_id')
            ->where('tbl_exmsistemasnerviosos.exSn_examenClinico', $exm_id)
            ->select('tbl_exmsistemasnerviosos.*')
            ->select(
                'exSn_id',
                'exSn_examenClinico',
                'exSn_fkSistemaNerviosoC',
                'exSn_detalle',
                'tbl_sistemanerviosos.snc_nombre as nombre'
            )->get()->toArray();

        return view('exmsistemasnerviosos.index', compact('exmsistemasnerviosos', 'exm_id'))
            ->with('success', 'Datos actualizados con éxito');
    }
}
