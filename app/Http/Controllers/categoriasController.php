<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorias;
use Illuminate\Support\Facades\DB;

class categoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = auth()->user()->id;
        $categorias = DB::table('categorias')->orderBy('cgID', 'asc')->where('cgEmpresa', $empresa)->get()->toArray();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('categorias.create');
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
            'cgNombre' => 'required|string|max:30',
            'cgDescripcion' => 'required|string|max:300'
        ]);
        $request->request->add(['cgEmpresa' => $empresa]);
        categorias::create($request->all());
        return redirect()->route('categorias.index')->with('success','Categoria creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorias = categorias::find($id);
        return view('categorias.show', compact('categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = categorias::find($id);
        return view('categorias.edit', compact('categorias'));
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
            'cgNombre' => 'required|string|max:30',
            'cgDescripcion' => 'required|string|max:300'
        ]);
       
        categorias::find($id)->update($request->all());
        return redirect()->route('categorias.index')->with('success','Categoria actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categorias::find($id)->delete();
        return redirect()->route('categorias.index')->with('success','Categoria Eliminada');
    }
}
