<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requisitos;
use Illuminate\Support\Facades\DB;

class requisitosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $message)
    {
        $requisitos = DB::table('requisitos')->orderBy('rqID', 'asc')->where('rqOfertaTrabajo', $id)->get()->toArray();
        if ($message != null) {
            return view('requisitos.index', compact('requisitos'))->with('success', $message)->with('rqOfertaTrabajo', $id);
        } else {
            return view('requisitos.index', compact('requisitos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_offer)
    {
        return view('requisitos.create')->with('rqOfertaTrabajo', $id_offer);
    }

    public function offer($id)
    {
        $requisitos = DB::table('requisitos')->orderBy('rqID', 'asc')->where('rqOfertaTrabajo', $id)->get()->toArray();
        return view('requisitos.index', compact('requisitos'))->with('rqOfertaTrabajo', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $rqOfertaTrabajo)
    {
        // ['rqNombre','rqOfertaTrabajo'];
        $this->validate($request, [
            'rqNombre' => 'required|string|max:30',
            'rqDescripcion' => 'required|string|max:300'
        ]);

        $request->request->add(['rqOfertaTrabajo' => $rqOfertaTrabajo]);
        requisitos::create($request->all());
        return $this->index($rqOfertaTrabajo, 'Requisito creado exitosamente');
        //return redirect()->route('requisitos.index')->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $rqOfertaTrabajo)
    {
        $requisitos = requisitos::find($id);
        return view('requisitos.show', compact('requisitos'))->with('rqOfertaTrabajo', $rqOfertaTrabajo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $rqOfertaTrabajo)
    {
        $requisitos = requisitos::find($id);
        return view('requisitos.edit', compact('requisitos'))->with('rqOfertaTrabajo', $rqOfertaTrabajo);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idOffer)
    {
        $this->validate($request, [
            'rqNombre' => 'required|string|max:30',
            'rqDescripcion' => 'required|string|max:300'
        ]);
        requisitos::find($id)->update($request->all());
        return $this->index($idOffer, 'Requisito actualizada con exito');
        //return redirect()->route('requisitos.index')->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id_offer)
    {
        requisitos::find($id)->delete();
        return $this->index($id_offer, 'Requisito Eliminada con Exito');
        //return redirect()->route('requisitos.index')->with('success','');
    }
}
