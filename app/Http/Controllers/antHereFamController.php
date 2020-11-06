<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\antHereFam;

class antHereFamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray();
        return view('curriculums.index', compact('curriculums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        $user = auth()->user();
        $curriculums = DB::table('curriculums')->join('users','curriculums.crUsuario', '=', 'users.id')
        ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
        ->where('crUsuario', $user->id)->get()->toArray();
        if(sizeof($curriculums) == 0){
            return view('curriculums.create');
        }
        return view('curriculums.index', compact('curriculums'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        $this->validate($request, [
            'crObservaciones' => 'required|string|max:300',
        ]);
        $request->request->add(['crUsuario' => auth()->user()->id]);
        antHereFam::create($request->all());
        return redirect()->route('curriculums.index')->with('success', '¡Curriculum creado exitosamente ahora puedes añadir tus experiencias y formaciones!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        $curriculums = antHereFam::find($id);
        return view('curriculums.show', compact('curriculums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $curriculums = antHereFam::find($id);
        return view('curriculums.edit', compact('curriculums'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $this->validate($request, [
            'crObservaciones' => 'required|string|max:300',
        ]);
        antHereFam::find($id)->update($request->all());
        return redirect()->route('curriculums.index')->with('success', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        antHereFam::find($id)->delete();
        return redirect()->route('curriculums.index')->with('success', 'curriculums Eliminado con Exito');
    }
}*/
