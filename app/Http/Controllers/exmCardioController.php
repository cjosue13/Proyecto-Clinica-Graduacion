<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_exmcardiovasculares;
use Illuminate\Support\Facades\DB;


class exmCardioController extends Controller
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
    public function indexECAR($exm_id, $idCon, $idExp)
    {
        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();
        return view('exmcardiovasculares.index', compact('exmcardiovasculares','exm_id','idCon','idExp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createECAR($exm_id, $idCon, $idExp)
    {
        return view('exmcardiovasculares.create', compact('exm_id','idCon','idExp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeECAR(Request $request, $exm_id, $idCon, $idExp)
    {
        
        $this->validate($request, [
            'car_detalle' => 'required|string',
            'car_tipo' => 'required|string'
        ]);

        tbl_exmcardiovasculares::create(['car_examenClinico' => $exm_id] + $request->all());

        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();
        return view('exmcardiovasculares.index', compact('exmcardiovasculares', 'exm_id','idCon','idExp'))->with('success','Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editECAR($id,$exm_id, $idCon, $idExp)
    {
        $exmcardiovasculares = tbl_exmcardiovasculares::find($id);
        return view('exmcardiovasculares.edit', compact('exmcardiovasculares','exm_id','idCon','idExp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateECAR(Request $request, $id, $exm_id, $idCon, $idExp)
    {
        $this->validate($request, [
            'car_detalle' => 'required|string',
            'car_tipo' => 'required|string'
        ]);

        tbl_exmcardiovasculares::find($id)->update($request->all());

        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();

        return view('exmcardiovasculares.index', compact('exmcardiovasculares', 'exm_id','idCon','idExp'))
        ->with('success','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteECAR($id, $exm_id, $idCon, $idExp)
    {
        tbl_exmcardiovasculares::find($id)->delete();
        $exmcardiovasculares = DB::table('tbl_exmcardiovasculares')->select('tbl_exmcardiovasculares.*')
        ->where('tbl_exmcardiovasculares.car_examenClinico', $exm_id)->get()->toArray();
        return view('exmcardiovasculares.index', compact('exmcardiovasculares', 'exm_id', 'idCon', 'idExp'))
        ->with('success','Datos actualizados con éxito');
    }
}
