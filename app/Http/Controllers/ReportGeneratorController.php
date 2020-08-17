<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\experiencias;
use App;
use PDF;

class ReportGeneratorController extends Controller
{
    public function ReporteCurriculum($user)
    {
        // Sacamos el usuario logueado, esto en caso de ser un candidato, si es empresa entonces hay que mostrarle
        // los canditados que están inscritos a sus ofertas
        $usuarios  = DB::table('users')->orderBy('id', 'asc')->where('id', $user)->get()->toArray();

        // Se obteien el curriculum para sacar las experiencias y formaciones
        $curriculums = DB::table('curriculums')->join('users', 'curriculums.crUsuario', '=', 'users.id')
            ->select('curriculums.crID', 'users.name as NombreUsuario', 'curriculums.crObservaciones')
            ->where('crUsuario', $user)->get()->toArray();
        //Obtenemos las formaciones
        $formaciones  = DB::table('formaciones')->orderBy('foID', 'asc')->where('foCurriculum', $curriculums[0]->crID)->get()->toArray();
        // Obtenemos las experiencias
        $experiencias  = DB::table('experiencias')->orderBy('exID', 'asc')->where('exCurriculum', $curriculums[0]->crID)->get()->toArray();
        
        $pdf = PDF::loadView('reporte1Curriculum', compact('usuarios', 'experiencias', 'formaciones'))->setPaper('a4', 'landscape');;
      
        return $pdf->stream('Reporte1.pdf');
    }

    public function ReporteEmpleos()
    {
        $ofertasaux  = DB::table('ofertas')->orderBy('ofCategoria', 'asc')->where('ofVacantes','>','0')->get()->toArray();
        $categorias  = DB::table('categorias')->orderBy('cgID', 'asc')->get()->toArray();
        $ofertas = array();
        $ofertas2 = array();
        foreach($ofertasaux as $key => $oferta){
            foreach($categorias as $key => $categoria){
                if($oferta->ofCategoria == $categoria->cgID){
                    $oferta->ofCategoria = $categoria->cgNombre;
                    array_push($ofertas2, $oferta);
                }
            }
        }

        $empresas = DB::table('users')
            ->select(
                'id',
                'name',
            )->get()->toArray();

        foreach ($ofertas2 as $key => $oferta) {
            foreach ($empresas as $key => $empresa) {
                if ($oferta->ofEmpresa == $empresa->id) {
                    $oferta->ofEmpresa = $empresa->name;
                    array_push($ofertas, $oferta);
                }
            }
        }

        $pdf = PDF::loadView('reporte2Empleos', compact('ofertas'))->setPaper('a4', 'landscape');;
        return $pdf->stream('Reporte2.pdf');
    }

    public function ReporteEmpresa($user)
    {
        $usuarios  = DB::table('users')->orderBy('id', 'asc')->where('id', $user)->get()->toArray();

        $pdf = PDF::loadView('reporte3Empresa', compact('usuarios'))->setPaper('a4', 'landscape');;
        return $pdf->stream('Reporte3.pdf');
    }

    public function ReporteOferta($user)
    {
        $ofertas  = DB::table('ofertas')->orderBy('ofID', 'asc')->where('ofID', $user)->get()->toArray();

        $pdf = PDF::loadView('reporte4Ofertas', compact('ofertas'))->setPaper('a4', 'landscape');;
        return $pdf->stream('Reporte4.pdf');
    }

    public function ReporteGrafico(){
        $empresas   = DB::table('ofertas')->join('users', 'ofertas.ofEmpresa', '=', 'users.id')
        ->where('users.tipoUsuario', 'E')
        ->select('users.name', DB::raw('sum(ofertas.ofVacantes) as vacantes'))->groupBy('users.name')
        ->get()->toArray();
        return view('reporte5Grafico', compact('empresas'));
    }
}
