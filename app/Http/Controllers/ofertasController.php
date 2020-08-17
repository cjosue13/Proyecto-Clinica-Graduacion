<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ofertas;
use App\inscripciones;
use Illuminate\Support\Facades\DB;


class ofertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = auth()->user()->id;
        $user = auth()->user()->tipoUsuario;
        $ofertas = array();
        if ($user == 'C') { //en el caso de que sea un candidato entonces mostramos toda la lista 
            $ofertas1 = DB::table('ofertas')
                ->join('categorias', 'ofertas.ofCategoria', '=', 'categorias.cgID')
                ->select(
                    'ofID',
                    'ofNombre',
                    'ofUbicacion',
                    'ofSueldo',
                    'ofDescripcion',
                    'categorias.cgNombre as ofNomCategoria',
                    'ofHorario',
                    'ofFechaInicio',
                    'ofFechaFinal',
                    'ofVacantes',
                    'ofEmpresa'
                )->get()->toArray();
        } else { //si es una empresa mostramos solamente las ofertas que esa empresa ha creado
            $ofertas1 = DB::table('ofertas')
                ->join('categorias', 'ofertas.ofCategoria', '=', 'categorias.cgID')
                ->select(
                    'ofID',
                    'ofNombre',
                    'ofUbicacion',
                    'ofSueldo',
                    'ofDescripcion',
                    'categorias.cgNombre as ofNomCategoria',
                    'ofHorario',
                    'ofFechaInicio',
                    'ofFechaFinal',
                    'ofVacantes',
                    'ofEmpresa'
                )->where('ofEmpresa', $userID)->get()->toArray();
        }

        $empresas = DB::table('users')
            ->select(
                'id',
                'name',
            )->get()->toArray();

        foreach ($ofertas1 as $key => $oferta) {
            foreach ($empresas as $key => $empresa) {
                if ($oferta->ofEmpresa == $empresa->id) {
                    $oferta->ofEmpresa = $empresa->name;
                    array_push($ofertas, $oferta);
                }
            }
        }


        return view('ofertas.index', compact('ofertas'))->with('tipoUsuario', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $empresa = auth()->user()->id;

        $categories = DB::table('categorias')->orderBy('cgID', 'asc')->where('cgEmpresa', $empresa)->get()->toArray();

        //$categories = categorias::all();
        return view('ofertas.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $ofID
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inscribir(Request $request, $ofID)
    {
        $user = auth()->user()->id;
        $request->request->add(['id_user' => $user]);
        $request->request->add(['id_oferta' => $ofID]);

        $inscripcionesAux = inscripciones::all();
        $variable = false;
        foreach ($inscripcionesAux as $key => $value) {
            if ($user == $value->id_user  && $ofID == $value->id_oferta) {
                $variable = true;
            }
        }
        if (!$variable) {
            inscripciones::create($request->all());
            return redirect()->route('ofertas.index')->with('success', 'Inscripción realizada con éxito');
        } else {
            return redirect()->route('ofertas.index')->with('warning', 'Usted ya posee una inscripción');
        }
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
        // ['ofNombre','ofFechaInicio','ofFechaFinal','ofLimite'];
        $this->validate($request, [
            'ofNombre' => 'required|string|max:50',
            'ofHorario' => 'required|string|max:300',
            'ofDescripcion' => 'required|string|max:300',
            'ofUbicacion' => 'required|string|max:300',
            'ofSueldo' => 'required|max:8,2',
            'ofCategoria' => 'required|int|max:10000',
            'ofFechaInicio' => 'required|string|max:10',
            'ofFechaFinal' => 'required|string|max:10',
            'ofVacantes' => 'required|int|max:999',
        ]);

        $request->request->add(['ofEmpresa' => $empresa]);

        ofertas::create($request->all());
        return redirect()->route('ofertas.index')->with('success', 'Oferta creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ofertas = ofertas::find($id);
        return view('ofertas.show', compact('ofertas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ofertas = ofertas::find($id);
        $empresa = auth()->user()->id;
        $categories = DB::table('categorias')->orderBy('cgID', 'asc')->where('cgEmpresa', $empresa)->get()->toArray();
        return view('ofertas.edit', compact('ofertas', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaCandidatos($id)
    {
        $ofertas = ofertas::find($id);
        $array = array();
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
            )->get()->toArray();
        $inscripciones = DB::table('inscripciones')
            ->select(
                'id_user',
                'id_oferta',
            )->where('inscripciones.id_oferta', $id)->get()->toArray();

        foreach ($usuarios as $key => $usuario) {
            foreach ($inscripciones as $key => $inscripcion) {
                if ($inscripcion->id_user == $usuario->id) {
                    array_push($array, $usuario);
                }
            }
        }
        return view('ofertas.listaCandidatos', compact('ofertas', 'array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaEmpleos()
    {
        $user = auth()->user()->id;
        $array = array();
        $ofertas = DB::table('ofertas')
            ->select(
                'ofID',
                'ofNombre',
                'ofUbicacion',
                'ofSueldo',
                'ofDescripcion',
                'ofCategoria',
                'ofHorario',
                'ofFechaInicio',
                'ofFechaFinal',
                'ofVacantes',
                'ofEmpresa'
            )->get()->toArray();

            

        return view('ofertas.listaOfertas', compact('ofertas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaOfertas()
    {
        $user = auth()->user()->id;
        $array = array();
        $array1 = array();
        $ofertas = DB::table('ofertas')
            ->select(
                'ofID',
                'ofNombre',
                'ofUbicacion',
                'ofSueldo',
                'ofDescripcion',
                'ofCategoria',
                'ofHorario',
                'ofFechaInicio',
                'ofFechaFinal',
                'ofVacantes',
                'ofEmpresa'
            )->get()->toArray();

        $inscripciones = DB::table('inscripciones')
            ->select(
                'id_user',
                'id_oferta',
            )->where('inscripciones.id_user', $user)->get()->toArray();

        foreach ($ofertas as $key => $oferta) {
            foreach ($inscripciones as $key => $inscripcion) {
                if ($inscripcion->id_oferta == $oferta->ofID) {
                    array_push($array1, $oferta);
                }
            }
        }

        $empresas = DB::table('users')
            ->select(
                'id',
                'name',
            )->get()->toArray();

        foreach ($array1 as $key => $oferta) {
            foreach ($empresas as $key => $empresa) {
                if ($oferta->ofEmpresa == $empresa->id) {
                    $oferta->ofEmpresa = $empresa->name;
                    array_push($array, $oferta);
                }
            }
        }

        
        

        return view('ofertas.listaOfertas', compact('array'));
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
            'ofNombre' => 'required|string|max:50',
            'ofHorario' => 'required|string|max:300',
            'ofDescripcion' => 'required|string|max:300',
            'ofUbicacion' => 'required|string|max:300',
            'ofSueldo' => 'required|max:8,2',
            'ofCategoria' => 'required|int|max:10000',
            'ofFechaInicio' => 'required|string|max:10',
            'ofFechaFinal' => 'required|string|max:10',
            'ofVacantes' => 'required|int|max:999',
        ]);
        $empresa = auth()->user()->id;
        ofertas::find($id)->update($request->all());
        return redirect()->route('ofertas.index')->with('success', 'Oferta actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ofertas::find($id)->delete();
        return redirect()->route('ofertas.index')->with('success', 'Oferta Eliminada con Exito');
    }

    public function filter(Request $request)
    {
        $ofertas = array();
        /* 
        *Traemos todas las ofertas
        */
        $ofertasAux = DB::table('ofertas')
            ->join('categorias', 'ofertas.ofCategoria', '=', 'categorias.cgID')
            ->select(
                'ofID',
                'ofNombre',
                'ofUbicacion',
                'ofSueldo',
                'ofDescripcion',
                'categorias.cgNombre as ofNomCategoria',
                'ofHorario',
                'ofFechaInicio',
                'ofFechaFinal',
                'ofCategoria',
                'ofVacantes',
                'ofEmpresa'
            )
            ->get()->toArray();

        $nombre = $request->request->get('txt_empresa');
        $usuarios = DB::table('users')
                ->where('users.name', 'LIKE','%' . $nombre . '%')
                ->get()->toArray();        
        if ($nombre != '') {
            
            foreach ($ofertasAux as $key => $oferta) {
                foreach ($usuarios as $key2 => $usuario) {
                    if ($usuario->id == $oferta->ofEmpresa) {
                        $oferta->ofEmpresa = $usuario->name;
                        array_push($ofertas, $oferta);
                    }
                }
            }
        } else {
            $nombre = $request->request->get('txt_categoria');
            $categories = DB::table('categorias')
                ->where('categorias.cgNombre', 'LIKE', '%' . $nombre . '%')
                ->get()->toArray();
                //print_r($categories);
            foreach ($ofertasAux as $key => $oferta) {
                foreach ($categories as $key2 => $categoria) {
                    if ($categoria->cgID == $oferta->ofCategoria) {
                        foreach ($usuarios as $key2 => $usuario) {
                            if ($usuario->id == $oferta->ofEmpresa) {
                                $oferta->ofEmpresa = $usuario->name;
                                //array_push($ofertas, $oferta);
                            }
                        }
                        array_push($ofertas, $oferta);
                    }
                }
            }
        }
        $user = auth()->user()->tipoUsuario;
        return view('ofertas.index', compact('ofertas'))->with('success', 'Ejecutado con éxito')->with('tipoUsuario', $user);
    }
}
