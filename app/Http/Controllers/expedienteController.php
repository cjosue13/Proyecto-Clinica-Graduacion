<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;


class expedienteController extends Controller
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
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $idPac)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_paciente', $paciente[0]->pac_id)->get()->toArray();
        if(sizeof($expediente)==0){
            $this->validate($request, [
                'exp_Metas' => 'required|string|max:1000',
                'exp_Historiabiopatografica' => 'required|string|max:500'
            ]);
            
            tbl_expedientes::create(['exp_paciente' => $idPac] + $request->all());
            
            $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $idPac)->get()->toArray();
            $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_paciente', $paciente[0]->pac_id)->get()->toArray();
            return view('expediente.index', compact('expediente', 'paciente'))->with('success','Expediente creado con éxito');
        }
        else{
            return view('expediente.index', compact('expediente', 'paciente'))->with('warning','Ya existe un expediente para este paciente');
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
    public function VerAntecedenteGinecologico($exp_id){
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $exp_id )->get()->toArray();
        $antecedentesginecologicos = DB::table('tbl_antecedentesginecologicos')->select('tbl_antecedentesginecologicos.*')->where('tbl_antecedentesginecologicos.ag_expediente', $expediente[0]->exp_id)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antecedentesginecologicos.index', compact('expediente', 'antecedentesginecologicos','paciente', 'exp_id'));
    }

    public function MenuAntecedentes($idExp, $Genero, $Nombre, $Apellido, $pac_id){
        return view('MenuAntecedentes', compact('idExp','Genero','Nombre','Apellido', 'pac_id'));
    }
}
