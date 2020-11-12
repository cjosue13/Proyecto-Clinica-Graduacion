<?php

namespace App\Http\Controllers;

use App\tbl_consultas;
use Illuminate\Http\Request;
use App\tbl_expedientes;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;


class consultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idExp)
    {
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        
        $consultas = DB::table('tbl_consultas')->where('tbl_consultas.c_fkExpediente', $expediente[0]->exp_id )->orderBy('c_id', 'asc')->get()->toArray();
        
        return view('consultas.index', compact('consultas', 'paciente', 'expediente'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idExp)
    {
        return view('consultas.create', compact('idExp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idPac)
    {
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $idPac)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_paciente', $paciente[0]->pac_id)->get()->toArray();
        if(sizeof($expediente)==0){
            $this->validate($request, [
                'exp_Metas' => 'required|string|max:1000',
                'exp_Historiabiopatografica' => 'required|string|max:500'
            ]);
            
            tbl_consultas::create(['exp_paciente' => $idPac] + $request->all());
            
            $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $idPac)->get()->toArray();
            $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_paciente', $paciente[0]->pac_id)->get()->toArray();
            return view('consultas.index', compact('expediente', 'paciente'))->with('success','Expediente creado con éxito');
        }
        else{
            return view('consultas.index', compact('expediente', 'paciente'))->with('warning','Ya existe un expediente para este paciente');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = tbl_consultas::find($id);
        return view('consultas.show', compact('consulta'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = tbl_consultas::find($id);
        return view('consultas.edit', compact('consulta'));
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
        tbl_consultas::find($id)->update($request->all());
        return redirect()->route('consultas.index')->with('success','Expediente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_consultas::find($id)->delete();
        return redirect()->route('consultas.index')->with('success', 'Expediente Eliminado con Exito');
    }

    public function MenuAntecedentes($idExp, $Genero){
        return view('MenuAntecedentes', compact('idExp','Genero'));
    }
}
