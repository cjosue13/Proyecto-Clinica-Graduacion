<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_pacientes;
use App\tbl_expedientes;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class pacientesController extends Controller
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

        $this->validate($request, [
            'pac_pNombre' => 'required|string|max:50',
            'pac_sNombre' => 'nullable|string|max:50',
            'pac_pApellido' => 'required|string|max:50',
            'pac_sApellido' => 'required|string|max:50',
            'pac_Cedula' => 'required|string|max:20',
            'pac_Genero' => 'required|string|max:1',
            'pac_FechaNacimiento' => 'required|date|before_or_equal:today',
            'pac_Residencia' => 'required|string|max:400',
            'pac_Correo' => 'nullable|string|max:50',
            'pac_Profesion_Oficio' => 'required|string|max:50',
            'pac_EstadoCivil' => 'required|string|max:2',
            'pac_Religion' => 'required|string|max:50'
        ]);
        tbl_pacientes::create($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado con éxito');
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
        return view('pacientes.index', compact('pacientes'));
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function VerExpediente($idPac)
    {
        $paciente = DB::table('tbl_pacientes')->select('tbl_pacientes.*')->where('tbl_pacientes.pac_id', $idPac)->get()->toArray();
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_paciente', $paciente[0]->pac_id)->get()->toArray();
        return view('expediente.index', compact('expediente', 'paciente'));
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
            'pac_pNombre' => 'required|string|max:50',
            'pac_sNombre' => 'nullable|string|max:50',
            'pac_pApellido' => 'required|string|max:50',
            'pac_sApellido' => 'required|string|max:50',
            'pac_Cedula' => 'required|string|max:20',
            'pac_Genero' => 'required|string|max:1',
            'pac_FechaNacimiento' => 'required|date|before_or_equal:today',
            'pac_Residencia' => 'required|string|max:400',
            'pac_Correo' => 'nullable|string|max:50',
            'pac_Profesion_Oficio' => 'required|string|max:50',
            'pac_EstadoCivil' => 'required|string|max:2',
            'pac_Religion' => 'required|string|max:50'
        ]);

        tbl_pacientes::find($id)->update($request->all());
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado con éxito');
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
        return redirect()->route('pacientes.index')->with('success', 'Paciente Eliminado');
    }

    // Generate PDF
    public function createPDF($id)
    {

        $pacientes = tbl_pacientes::find($id);
        $expediente = DB::table('tbl_expedientes')->select('tbl_expedientes.*')->where('tbl_expedientes.exp_paciente', $pacientes->pac_id)->get();
        // retreive all records from db

        // share data to view
        view()->share('pacientes', $pacientes);
        //view()->share('expediente', $expediente);
        $pdf = PDF::loadView('reporteExpediente', compact('expediente'));

        // download PDF file with download method
        return $pdf->stream();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtro(Request $request)
    {
        $nombre = $request->request->get('txt_nombre');

        $pacientes = DB::table('tbl_pacientes')->orderBy('pac_id', 'asc')
            ->where('tbl_pacientes.pac_pNombre', 'LIKE', '%' . $nombre . '%')->get()->toArray();

        if ($pacientes == null) {
            $pacientes = DB::table('tbl_pacientes')->orderBy('pac_id', 'asc')
                ->where('tbl_pacientes.pac_Cedula', 'LIKE', '%' . $nombre . '%')->get()->toArray();
        }

        return view('pacientes.index', compact('pacientes'));
    }
}
