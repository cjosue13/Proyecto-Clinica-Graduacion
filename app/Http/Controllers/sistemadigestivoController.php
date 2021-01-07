<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_sistemadigestivos;
use Illuminate\Support\Facades\DB;

class sistemadigestivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistemadigestivos = DB::table('tbl_sistemadigestivos')->orderBy('sd_id', 'asc')->get()->toArray();
        return view('sistemadigestivos.index', compact('sistemadigestivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sistemadigestivos.create');
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
            'sg_nombre' => 'required|string|max:50',
        ]);
        tbl_sistemadigestivos::create($request->all());
        return redirect()->route('sistemadigestivos.index')->with('success','Dato en sistema digestivo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sistemadigestivos = tbl_sistemadigestivos::find($id);
        return view('sistemadigestivos.show', compact('sistemadigestivos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sistemadigestivos = tbl_sistemadigestivos::find($id);
        return view('sistemadigestivos.edit', compact('sistemadigestivos'));
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
            'sg_nombre' => 'required|string|max:50',
        ]);
       
        tbl_sistemadigestivos::find($id)->update($request->all());
        return redirect()->route('sistemadigestivos.index')->with('success','Dato de sistema digestivo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_sistemadigestivos::find($id)->delete();
        return redirect()->route('sistemadigestivos.index')->with('success','Dato de sistema digestivo eliminado');
    }
}
