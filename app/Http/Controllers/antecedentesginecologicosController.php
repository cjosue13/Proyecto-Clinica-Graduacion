<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_antecedentesginecologicos;
use App\tbl_expedientes;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;

class antecedentesginecologicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->orderBy('ag_id', 'asc')->get()->toArray();
        return view('antecedentesginecologicos.index', compact('antecedentesginecologicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idExp)
    {
        return view('antecedentesginecologicos.create', compact('idExp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAG(Request $request, $idExp)
    {
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        if(sizeof($antecedentesginecologicos)==0){
            $this->validate($request, [
                'ag_Menarca' => 'required|string|max:10',
                'ag_Edad' => 'required|int|max:150',
                'ag_CiclosMenstruales' => 'required|int|max:999',
                'ag_Embarazos' => 'required|int|max:99',
                'ag_Partos' => 'required|int|max:99',
                'ag_Abortos' => 'required|int|max:99',
                'ag_Cesareas' => 'required|int|max:99',
                'ag_FUR' => 'required|string|max:10',
                'ag_FUPAP' => 'required|string|max:10',
                'ag_PF' => 'required|string|max:1',
                'ag_PF_detalle' => 'required|string|max:1000',
                'ag_PRS' => 'required|string|max:10',
                'ag_NoCS' => 'required|int|max:999'
            ]);
            tbl_antecedentesginecologicos::create(['ag_expediente' => $idExp] + $request->all());
            
            $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
            $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
            $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
            return redirect()->route('antecedentesginecologicos.index',compact('paciente', 'expediente','antecedentesginecologicos' ))->with('success','Antecedente Ginecologico creado con éxito');    
        }
        else{
            return redirect()->route('antecedentesginecologicos.index',compact('paciente', 'expediente','antecedentesginecologicos'))->with('warning','Ya existen antecedentes para este paciente');    
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
        $antecedentesginecologicos = tbl_antecedentesginecologicos::find($id);
        return view('antecedentesginecologicos.show', compact('antecedentesginecologicos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $antecedentesginecologicos = tbl_antecedentesginecologicos::find($id);
        return view('antecedentesginecologicos.edit', compact('antecedentesginecologicos'));
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
            'ag_Menarca' => 'required|string|max:10',
            'ag_Edad' => 'required|int|max:150',
            'ag_CiclosMenstruales' => 'required|int|max:999',
            'ag_Embarazos' => 'required|int|max:99',
            'ag_Partos' => 'required|int|max:99',
            'ag_Abortos' => 'required|int|max:99',
            'ag_Cesareas' => 'required|int|max:99',
            'ag_FUR' => 'required|string|max:10',
            'ag_FUPAP' => 'required|string|max:10',
            'ag_PF' => 'required|string|max:1',
            'ag_PF_detalle' => 'required|string|max:1000',
            'ag_PRS' => 'required|string|max:10',
            'ag_NoCS' => 'required|int|max:999'
        ]);
       
        tbl_antecedentesginecologicos::find($id)->update($request->all());
        return redirect()->route('antecedentesginecologicos.index')->with('success','Antecedentes Ginecologicos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id,$idExp)
    {
        tbl_antecedentesginecologicos::find($id)->delete();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos', 'paciente'));
    }
}
