<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\formaciones;
use Illuminate\Support\Facades\DB;

class formacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 
        $formaciones  = DB::table('formaciones')->orderBy('foID', 'asc')->where('foCurriculum', $curriculums[0]->crID)->get()->toArray();

        return view('formaciones.index', compact('formaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ['foCurriculum','foTitulo','foEspecialidad','foInstitucion', 'foFecha'];
        $this->validate($request,[
          'foTitulo'=>'required|string|max:50',
          'foEspecialidad'=>'required|max:50',
          'foInstitucion'=>'required|string|max:50',
          'foFecha'=>'required|string|max:10',
        ]);
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 

        $request->request->add(['foCurriculum' => $curriculums[0]->crID]);
        formaciones::create($request->all());
        $formaciones  = DB::table('formaciones')->orderBy('foID', 'asc')->where('foCurriculum', $curriculums[0]->crID)->get()->toArray();
        return redirect()->route('formaciones.index')->with('success','Formación creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function curriculum($id){
        $formaciones  = DB::table('formaciones')->orderBy('foID', 'asc')->where('foCurriculum', $id)->get()->toArray();
        return view('formaciones.index', compact('formaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formaciones = formaciones::find($id);
        return view('formaciones.edit',compact('formaciones'));
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
        $this->validate($request,[
            'foTitulo'=>'required|string|max:50',
            'foEspecialidad'=>'required|max:50',
            'foInstitucion'=>'required|string|max:50',
            'foFecha'=>'required|string|max:10',
          ]);
        formaciones::find($id)->update($request->all());
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 
        $formaciones  = DB::table('formaciones')->orderBy('foID', 'asc')->where('foCurriculum', $curriculums[0]->crID)->get()->toArray();

        return redirect()->route('formaciones.index', compact('formaciones'))->with('success','Formación actualizada con exito');
    }

    public function show($id)
    {
        $formaciones = formaciones::find($id);
        return view('formaciones.show', compact('formaciones'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        formaciones::find($id)->delete();
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 
        $formaciones  = DB::table('formaciones')->orderBy('foID', 'asc')->where('foCurriculum', $curriculums[0]->crID)->get()->toArray();

        return redirect()->route('formaciones.index', compact('formaciones'))->with('success','Formación Eliminada con Exito');
    }
}
