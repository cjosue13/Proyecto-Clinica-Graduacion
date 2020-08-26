<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_pacientes;
use Illuminate\Support\Facades\DB;

class pacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $pacientes = DB::table('tbl_pacientes')->orderBy('pac_id', 'asc')->get()->toArray();
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = auth()->user()->id;
        $this->validate($request, [
            'pac_fkExpediente' => 'required|int|max:10000',
            'pac_pNombre' => 'required|string|max:50',
            'pac_sNombre' => 'required|string|max:50',
            'pac_pApellido' => 'required|string|max:50',
            'pac_sApellido' => 'required|string|max:50',
            'pac_Edad' => 'required|int|max:150',
            'pac_Cedula' => 'required|string|max:20',
            'pac_Genero' => 'required|string|max:1',
            'pac_FechaNacimiento' => 'required|string|max:10',
            'pac_Residencia' => 'required|string|max:400',
            'pac_Correo' => 'required|string|max:50',
            'pac_Profesion_Oficio' => 'required|string|max:50',
            'pac_EstadoCivil' => 'required|string|max:2',
            'pac_Religion' => 'required|string|max:50'
        ]);
        tbl_pacientes::create($request->all());
        return redirect()->route('pacientes.index')->with('success','Paciente creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pacientes = tbl_pacientes::find($id);
        return view('pacientes.show', compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacientes = tbl_pacientes::find($id);
        return view('pacientes.edit', compact('pacientes'));
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
            'pac_fkExpediente' => 'required|int|max:10000',
            'pac_pNombre' => 'required|string|max:50',
            'pac_sNombre' => 'required|string|max:50',
            'pac_pApellido' => 'required|string|max:50',
            'pac_sApellido' => 'required|string|max:50',
            'pac_Edad' => 'required|int|max:150',
            'pac_Cedula' => 'required|string|max:20',
            'pac_Genero' => 'required|string|max:1',
            'pac_FechaNacimiento' => 'required|string|max:10',
            'pac_Residencia' => 'required|string|max:400',
            'pac_Correo' => 'required|string|max:50',
            'pac_Profesion_Oficio' => 'required|string|max:50',
            'pac_EstadoCivil' => 'required|string|max:2',
            'pac_Religion' => 'required|string|max:50'
        ]);
       
        tbl_pacientes::find($id)->update($request->all());
        return redirect()->route('pacientes.index')->with('success','Paciente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_pacientes::find($id)->delete();
        return redirect()->route('pacientes.index')->with('success','Paciente Eliminado');
    }
}
