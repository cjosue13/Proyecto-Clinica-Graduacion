<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;


class expedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $expediente = DB::table('tbl_expedientes')->orderBy('exp_id', 'asc')->get()->toArray();
        return view('expediente.index', compact('expediente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPac)
    {
        return view('expediente.create', compact('idPac'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idPac)
    {
        $this->validate($request, [
            'exp_Metas' => 'required|string|max:1000',
            'exp_Historiabiopatografica' => 'required|string|max:500'
        ]);
        tbl_expedientes::create($request->all());
        $expediente = tbl_expedientes::latest('exp_id')->first(); // esto es para obtener el expediente que se acaba de insertar
        DB::table('tbl_pacientes')->where('tbl_pacientes.pac_id', $idPac)->update(['pac_fkExpediente' => $expediente['exp_id']]);
        return redirect()->route('pacientes.index')->with('success','Expediente creado con éxito');
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
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_id', $expediente[0]->exp_fkAntGin)->get()->toArray();
        return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos'));
    }
}
