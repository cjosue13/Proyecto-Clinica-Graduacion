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
        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')->orderBy('ea_id', 'asc')->get()->toArray();
        $antNoPatologicosAux = array();
        $antNoPatologicos = DB::table('tbl_expedientes_antecedecentes')
                ->join('tbl_antenfermedades', 'tbl_expedientes_antecedecentes.ea_enfermedad', '=', 'tbl_antenfermedades.atpnp_id')
                ->where('tbl_expedientes_antecedecentes.ea_expediente', $idExp)
                ->select(
                    'ea_id',
                    'ea_expediente',
                    'tbl_antenfermedades.atpnp_nombre as eaNomEnfermedad',
                    'ea_Descripcion',
                )->get()->toArray();
        return view('antNoPatologicos.index', compact('antNoPatologicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('antNoPatologicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'ea_Descripcion' => 'required|string|max:1000',
        ]);
        tbl_expedientes_antecedecentes::create($request->all());
        return redirect()->route('antNoPatologicos.index')->with('success','Antecedente creado con éxito');
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
    public function edit($id)
    {
        $antNoPatologicos = tbl_expedientes_antecedecentes::find($id);
        return view('antNoPatologicos.edit', compact('antNoPatologicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ea_Descripcion' => 'required|string|max:1000',
        ]);
       
        tbl_expedientes_antecedecentes::find($id)->update($request->all());
        return redirect()->route('antNoPatologicos.index')->with('success','Antecedente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_expedientes_antecedecentes::find($id)->delete();
        return redirect()->route('antNoPatologicos.index')->with('success','Antecedente Eliminado');
    }
}
