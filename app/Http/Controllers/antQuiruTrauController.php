<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_antquirutrau;
use Illuminate\Support\Facades\DB;

class antQuiruTrauController extends Controller
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
    public function index($idExp,$tipo)
    {
        $antecedentes = DB::table('tbl_antquirutrau')->select('tbl_antquirutrau.*')->where('tbl_antquirutrau.atqt_fkExpediente', $idExp)->where('tbl_antquirutrau.atqt_tipo',$tipo)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        return view('antQuiruTrau.index', compact('idExp','tipo','antecedentes','paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createQT($idExp,$Tipo)
    {
        return view('antQuiruTrau.create',compact('idExp','Tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeQT(Request $request,$idExp,$tipo)
    {

        $this->validate($request, [
            'atqt_Nombre' => 'required|string|max:50',
            'atqt_descripcion' => 'required|string|max:100',
            'atqt_fecha' => 'required|date|before_or_equal:today',
        ]);

        tbl_antquirutrau::create(['atqt_fkExpediente' => $idExp] + ['atqt_tipo' => $tipo] + $request->all());
        $antecedentes = DB::table('tbl_antquirutrau')->select('tbl_antquirutrau.*')->where('tbl_antquirutrau.atqt_fkExpediente', $idExp)->where('tbl_antquirutrau.atqt_tipo',$tipo)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();

        return view('antQuiruTrau.index', compact('idExp','tipo','antecedentes','paciente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antecedentes = tbl_antquirutrau::find($id);
        return view('antQuiruTrau.show', compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editQT($id, $idExp, $tipo)
    {
        $antecedentes = tbl_antquirutrau::find($id);
        return view('antQuiruTrau.edit', compact('antecedentes', 'idExp', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateQT(Request $request, $id, $idExp, $tipo)
    {
        $this->validate($request, [
            'atqt_Nombre' => 'required|string|max:50',
            'atqt_descripcion' => 'required|string|max:100',
            'atqt_fecha' => 'required|date|before_or_equal:today',
        ]);
       
        tbl_antquirutrau::find($id)->update($request->all());
        $antecedentes = DB::table('tbl_antquirutrau')->select('tbl_antquirutrau.*')->where('tbl_antquirutrau.atqt_fkExpediente', $idExp)->where('tbl_antquirutrau.atqt_tipo',$tipo)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antQuiruTrau.index', compact('idExp','tipo','antecedentes','paciente'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteQT($id, $idExp, $tipo)
    {
        tbl_antquirutrau::find($id)->delete();
        $antecedentes = DB::table('tbl_antquirutrau')->select('tbl_antquirutrau.*')->where('tbl_antquirutrau.atqt_fkExpediente', $idExp)->where('tbl_antquirutrau.atqt_tipo',$tipo)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
        return view('antQuiruTrau.index', compact('idExp','tipo','antecedentes','paciente'));;
    }
}
