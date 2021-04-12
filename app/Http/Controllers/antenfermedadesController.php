<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_antenfermedades;
use Illuminate\Support\Facades\DB;

class antenfermedadesController extends Controller
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
        $antenfermedades = DB::table('tbl_antenfermedades')->orderBy('atpnp_tipo', 'asc')->get()->toArray();
        return view('antenfermedades.index', compact('antenfermedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('antenfermedades.create');
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
            'atpnp_nombre' => 'required|string|max:50',
            'atpnp_tipo' => 'required|string|max:50',
        ]);
        tbl_antenfermedades::create($request->all());
        return redirect()->route('antenfermedades.index')->with('success','Enfermedad creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $antenfermedades = tbl_antenfermedades::find($id);
        return view('antenfermedades.show', compact('antenfermedades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $antenfermedades = tbl_antenfermedades::find($id);
        return view('antenfermedades.edit', compact('antenfermedades'));
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
            'atpnp_nombre' => 'required|string|max:50',
            'atpnp_tipo' => 'required|string|max:50',
        ]);
       
        tbl_antenfermedades::find($id)->update($request->all());
        return redirect()->route('antenfermedades.index')->with('success','Enfermedad actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_antenfermedades::find($id)->delete();
        return redirect()->route('antenfermedades.index')->with('success','Enfermedad Eliminada');
    }
}
