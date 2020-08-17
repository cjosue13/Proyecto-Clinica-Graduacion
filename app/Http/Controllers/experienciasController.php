<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\experiencias;
use App\curriculums;

class experienciasController extends Controller
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
        $experiencias  = DB::table('experiencias')->orderBy('exID', 'asc')->where('exCurriculum', $curriculums[0]->crID)->get()->toArray();
        return view('experiencias.index', compact('experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experiencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ['exPuesto','exEmpresa','exCurriculum','exFechaInicio', 'fechaFinal', 'exDescripcion'];
        $this->validate($request,[
          'exPuesto'=>'required|string|max:50',
          'exEmpresa'=>'required|string|max:50',
          'exFechaInicio'=>'required|string|max:10',
          'fechaFinal'=>'required|string|max:10',
          'exDescripcion'=>'required|string|max:300',
        ]);

        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 

        $request->request->add(['exCurriculum' => $curriculums[0]->crID]);
        experiencias::create($request->all());
        $experiencias  = DB::table('experiencias')->orderBy('exID', 'asc')->where('exCurriculum', $curriculums[0]->crID)->get()->toArray();
        
        return redirect()->route('experiencias.index', compact('experiencias'))->with('success','Experiencia creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function curriculum($id){
        $experiencias  = DB::table('experiencias')->orderBy('exID', 'asc')->where('exCurriculum', $id)->get()->toArray();
        return view('experiencias.index', compact('experiencias'));
    }

    public function show($id)
    {
        $experiencias = experiencias::find($id);
        return view('experiencias.show', compact('experiencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$user = auth()->user();
        $curriculum = DB::table('curriculums')->orderBy('crID', 'asc')->pluck('crID', 'crUsuario');
        $id_curr = 0;
        foreach ($curriculum as $k => $v) {
            if($k == $user->id){
                
            }
        }*/
        $experiencias = experiencias::find($id);
        return view('experiencias.edit',compact('experiencias'));
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
            'exPuesto'=>'required|string|max:50',
            'exEmpresa'=>'required|string|max:50',
            'exFechaInicio'=>'required|string|max:10',
            'fechaFinal'=>'required|string|max:10',
            'exDescripcion'=>'required|string|max:300',
          ]);
        experiencias::find($id)->update($request->all());
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 
        $experiencias  = DB::table('experiencias')->orderBy('exID', 'asc')->where('exCurriculum', $curriculums[0]->crID)->get()->toArray();
        return redirect()->route('experiencias.index', compact('experiencias'))->with('success','Experiencia actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        experiencias::find($id)->delete();
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray(); 
        $experiencias  = DB::table('experiencias')->orderBy('exID', 'asc')->where('exCurriculum', $curriculums[0]->crID)->get()->toArray();

        return redirect()->route('experiencias.index', compact('experiencias'))->with('success','Experiencia Eliminada con Exito');
    }
}
