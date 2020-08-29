<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_expedientes;
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
    public function create()
    {

        return view('expediente.create');
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
            'exp_Metas' => 'required|string|max:1000',
            'exp_Historiabiopatografica' => 'required|string|max:500'
        ]);
        tbl_expedientes::create($request->all());
        return redirect()->route('expediente.index')->with('success','Expediente creado con éxito');
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
        return redirect()->route('expediente.index')->with('success','Expediente actualizado con éxito');
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
        return redirect()->route('expediente.index')->with('success', 'Expediente Eliminado con Exito');
    }
}
