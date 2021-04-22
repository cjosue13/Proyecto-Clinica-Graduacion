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
    public function create($exp_id)
    {
        return view('antecedentesginecologicos.create', compact('exp_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAG(Request $request, $exp_id)
    {
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $exp_id)->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        if(sizeof($antecedentesginecologicos)==0){
            $this->validate($request, [
                'ag_Menarca' => 'required|string|max:10',
                'ag_Edad' => 'required|int|max:20',
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

            tbl_antecedentesginecologicos::create(['ag_expediente' => $exp_id] + $request->all()); 
            $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
            return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos', 'paciente', 'exp_id'));
        }
        else{
            return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos', 'paciente', 'exp_id'));
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
    public function edit($id,$exp_id)
    {
        $antecedentesginecologicos = tbl_antecedentesginecologicos::find($id);
        return view('antecedentesginecologicos.edit', compact('antecedentesginecologicos','exp_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAG(Request $request, $id, $exp_id)
    {

        $this->validate($request, [
            'ag_Menarca' => 'required|string|max:10',
            'ag_Edad' => 'required|int|max:20',
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
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $exp_id)->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos', 'paciente', 'exp_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id,$exp_id)
    {
        tbl_antecedentesginecologicos::find($id)->delete();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $exp_id)->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos', 'paciente', 'exp_id'));
    }
}
