<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_examenes;
use Illuminate\Support\Facades\DB;


class examenesController extends Controller
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
    public function indexEx($idCon)
    {
        $examenes = DB::table('tbl_examenes')->select('tbl_examenes.*')
        ->where('tbl_examenes.exmm_fkConsulta', $idCon)->get()->toArray();
        return view('examenes.index', compact('examenes','idCon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCon)
    {
        return view('examenes.create', compact('idCon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEx(Request $request, $idCon)
    {
        
        $this->validate($request, [
            'exmm_Nombre' => 'required|string|max:50',
            'exmm_Descripcion' => 'required|string|max:1000', 
            'exmm_Imagen' => 'required|string|max:2048',
        ]);
        
        tbl_examenes::create(['exmm_fkConsulta' => $idCon] + $request->all());

        $examenes = DB::table('tbl_examenes')->select('tbl_examenes.*')
        ->where('tbl_examenes.exmm_fkConsulta', $idCon)->get()->toArray();
        return view('examenes.index', compact('examenes', 'idCon'))->with('success','Datos guardados con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEx($id,$idCon)
    {
        $examenes = tbl_examenes::find($id);
        return view('examenes.edit', compact('examenes','idCon'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEx(Request $request, $id,$idCon)
    {

        $this->validate($request, [
            'exmm_Nombre' => 'required|string|max:50',
            'exmm_Descripcion' => 'required|string|max:1000', 
            'exmm_Imagen' => 'required|string|max:2048',
        ]);

        tbl_examenes::find($id)->update( $request->all());

        $examenes = DB::table('tbl_examenes')->select('tbl_examenes.*')
        ->where('tbl_examenes.exmm_fkConsulta', $idCon)->get()->toArray();

        return view('examenes.index', compact('examenes', 'idCon'))
        ->with('success','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEx($id, $idCon)
    {
        tbl_examenes::find($id)->delete();
        $examenes = DB::table('tbl_examenes')->select('tbl_examenes.*')
        ->where('tbl_examenes.exmm_fkConsulta', $idCon)->get()->toArray();

        return view('examenes.index', compact('examenes', 'idCon'))
        ->with('success','Datos eliminados con éxito');
    }
}
