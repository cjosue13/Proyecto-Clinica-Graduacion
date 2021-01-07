<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_sistemanerviosos;
use Illuminate\Support\Facades\DB;

class sistemanerviosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistemanerviosos = DB::table('tbl_sistemanerviosos')->orderBy('snc_id', 'asc')->get()->toArray();
        return view('sistemanerviosos.index', compact('sistemanerviosos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sistemanerviosos.create');
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
            'snc_nombre' => 'required|string|max:50',
        ]);
        tbl_sistemanerviosos::create($request->all());
        return redirect()->route('sistemanerviosos.index')->with('success','Dato en sistema nervioso creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sistemanerviosos = tbl_sistemanerviosos::find($id);
        return view('sistemanerviosos.show', compact('sistemanerviosos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sistemanerviosos = tbl_sistemanerviosos::find($id);
        return view('sistemanerviosos.edit', compact('sistemanerviosos'));
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
            'snc_nombre' => 'required|string|max:50',
        ]);
       
        tbl_sistemanerviosos::find($id)->update($request->all());
        return redirect()->route('sistemanerviosos.index')->with('success','Dato de sistema nervioso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tbl_sistemanerviosos::find($id)->delete();
        return redirect()->route('sistemanerviosos.index')->with('success','Dato de sistema nervioso eliminado');
    }
}
