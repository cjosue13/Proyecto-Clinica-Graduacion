<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\experiencias;
use App;
use PDF;

class reportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reportes.index');
    }

    public function consultas()
    {
        return view('reportes.viewConsulta');
    }

    public function agenda()
    {
        return view('reportes.viewAgenda');
    }
}
