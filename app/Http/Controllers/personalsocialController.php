<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes;
use App\tbl_personalessociales;
use Illuminate\Support\Facades\DB;


class personalsocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPS($idExp)
    {
        $personalsocial = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)->get()->toArray();
        return view('personalsocial.index', compact('personalsocial','idExp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idExp)
    {
        return view('personalsocial.create', compact('idExp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePS(Request $request, $idExp)
    {
        $personalsocial = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)->get()->toArray();
        $this->validate($request, [
            'ps_Etapa' => 'required|string|max:30',
            'ps_descripcion' => 'required|string|max:1000'
        ]);
        
        tbl_personalessociales::create(['ps_fkExpediente' => $idExp] + $request->all());
        $personalsocial = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)->get()->toArray();
        return view('personalsocial.index', compact('personalsocial', 'idExp'))->with('success','Datos guardados con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expediente = tbl_expedientes::find($id);
        return view('expediente.show', compact('expediente'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = tbl_expedientes::find($id);
        return view('expediente.edit', compact('expediente'));
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
            'exp_Metas' => 'required|string|max:1000',
            'exp_Historiabiopatografica' => 'required|string|max:500'
        ]);
        tbl_expedientes::find($id)->update($request->all());
        return redirect()->route('pacientes.index')->with('success','Expediente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_expedientes::find($id)->delete();
        return redirect()->route('pacientes.index')->with('success', 'Expediente Eliminado con Exito');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function VerAntecedenteGinecologico($idExp){
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos'));
    }

    public function MenuAntecedentes($idExp, $Genero){
        return view('MenuAntecedentes', compact('idExp','Genero'));
    }
}
