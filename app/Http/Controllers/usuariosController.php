<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $usuarios  = DB::table('users')->orderBy('id', 'asc')->where('id', $user->id)->get()->toArray();
        return view('usuarios.index', compact('usuarios'));
    }

    public function subirImagen(Request $request)
    {
        $filename = $request->photo->getClientOriginalName();
        $request->photo->storeAs('images',$filename, 'public');
        User::find(auth()->user()->id)->update(['photo' => $filename]);
        return redirect()->route('usuarios.edit', auth()->user()->id)->with('success', 'Usuario actualizado con exito');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    public function filtro(Request $request){
        $nombre = $request->request->get('txt_empresa');

        $usuarios = DB::table('users')->orderBy('id', 'asc')
        ->where('users.tipoUsuario', 'E')
        ->where('users.name', 'LIKE', '%' . $nombre . '%')->get()->toArray();
        return view('usuarios.listaEmpresas', compact('usuarios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios = user::find($id);
        return view('usuarios.show', compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = user::find($id);
        return view('usuarios.edit', compact('usuarios'));
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50'],
            'cedula' => ['required', 'string', 'max:50']
        ]);
        user::find($id)->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::find($id)->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario Eliminado con Exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaEmpresas()
    {
        $usuarios = DB::table('users')
            ->select(
                'id',
                'name',
                'username',
                'email',
                'address',
                'phone',
                'photo',
                'cedula'
            )->where('tipoUsuario', 'E')->get()->toArray();

        return view('usuarios.listaEmpresas', compact('usuarios'));
    }
}
