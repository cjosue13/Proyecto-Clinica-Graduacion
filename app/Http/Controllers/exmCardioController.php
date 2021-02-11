<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_exmcardiovasculares;
use Illuminate\Support\Facades\DB;


class exmCardioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexECAR($exm_id)
    {
        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();
        return view('exmcardiovasculares.index', compact('exmcardiovasculares','exm_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createECAR($exm_id)
    {
        return view('exmcardiovasculares.create', compact('exm_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeECAR(Request $request, $exm_id)
    {
        
        $this->validate($request, [
            'car_detalle' => 'required|string',
            'car_tipo' => 'required|string'
        ]);

        tbl_exmcardiovasculares::create(['car_examenClinico' => $exm_id] + $request->all());

        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();
        return view('exmcardiovasculares.index', compact('exmcardiovasculares', 'exm_id'))->with('success','Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editECAR($id,$exm_id)
    {
        $exmcardiovasculares = tbl_exmcardiovasculares::find($id);
        return view('exmcardiovasculares.edit', compact('exmcardiovasculares','exm_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateECAR(Request $request, $id, $exm_id)
    {
        $this->validate($request, [
            'car_detalle' => 'required|string',
            'car_tipo' => 'required|string'
        ]);

        tbl_exmcardiovasculares::find($id)->update($request->all());

        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();

        return view('exmcardiovasculares.index', compact('exmcardiovasculares', 'exm_id'))
        ->with('success','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteECAR($id, $exm_id)
    {
        tbl_exmcardiovasculares::find($id)->delete();
        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();
        return view('exmcardiovasculares.index', compact('exmcardiovasculares', 'exm_id'))
        ->with('success','Datos actualizados con éxito');
    }
}
