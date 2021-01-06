<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_id', $idExp)->get()->toArray();
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $expediente[0]->exp_paciente)->get()->toArray();
      
        return view('personalsocial.index', compact('personalsocial','idExp','paciente'));
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

        $validacion = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)
        ->where('tbl_personalessociales.ps_Etapa', $request['ps_Etapa'])->get()->toArray();
        if(sizeof($validacion)==0){
            $this->validate($request, [
                'ps_Etapa' => 'required|string|max:30',
                'ps_descripcion' => 'required|string|max:1000'
            ]);
            tbl_personalessociales::create(['ps_fkExpediente' => $idExp] + $request->all());
            $personalsocial = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)->get()->toArray();
            return view('personalsocial.index', compact('personalsocial', 'idExp'))->with('success','Datos guardados con éxito');
        }
        else{
            return view('personalsocial.index', compact('personalsocial', 'idExp'))->with('warning','Esta etapa ya existe');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPS($id,$idExp)
    {
        $personalsocial = tbl_personalessociales::find($id);
        return view('personalsocial.edit', compact('personalsocial','idExp'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePS(Request $request, $id,$idExp)
    {
        $actual = tbl_personalessociales::find($id);

        $this->validate($request, [
            'ps_descripcion' => 'required|string|max:1000'
        ]);

        tbl_personalessociales::find($id)->update(['ps_Etapa' => $actual->ps_Etapa] + $request->all());

        $personalsocial = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)->get()->toArray();
        return view('personalsocial.index', compact('personalsocial', 'idExp'))
        ->with('success','Datos actualizados con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePS($id, $idExp)
    {
        tbl_personalessociales::find($id)->delete();
        $personalsocial = DB::table('tbl_personalessociales')->select('tbl_personalessociales.*')
        ->where('tbl_personalessociales.ps_fkExpediente', $idExp)->get()->toArray();

        return view('personalsocial.index', compact('personalsocial', 'idExp'))
        ->with('success','Datos actualizados con éxito');
    }
}
