<?php

use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/Reportes', function () {
    return view('Reportes');
})->name('reportes');

Route::get('/auth', function () {
    return view('auth.register');
})->name('auth');

Route::get('pdf/{user}', 'ReportGeneratorController@ReporteCurriculum')->name('pdf');//Reportecurriculum
Route::get('pdf2', 'ReportGeneratorController@ReporteEmpleos')->name('pdf2');//ReporteEmpresa
Route::get('pdf3/{user}', 'ReportGeneratorController@ReporteEmpresa')->name('pdf3');//ReporteEmpresa
Route::get('pdf4/{user}', 'ReportGeneratorController@ReporteOferta')->name('pdf4');//Reporteoferta
Route::get('pdf5', 'ReportGeneratorController@ReporteGrafico')->name('pdf5');//ReporteGrafico

Route::post('usuarios/save', 'usuariosController@save');

Route::get('usuarios/filtro/', [
    'as' => 'filtro', 'uses' => 'usuariosController@filtro'
]);


Route::get('pacientes/VerExpediente/{id}', 'pacientesController@VerExpediente')->name('VerExpediente');
Route::get('expediente/VerAntecedenteGinecologico/{id}', 'expedienteController@VerAntecedenteGinecologico')->name('VerAntecedenteGinecologico');
Route::get('expediente/create/{id}', 'expedienteController@create')->name('createExp');
Route::get('antecedentesginecologicos/create/{id}', 'antecedentesginecologicosController@create')->name('create');

Route::post('expediente/store/{id}', [
    'as' => 'store', 'uses' => 'expedienteController@store'
]);

Route::post('antQuiruTrau/index/{idExp}/{Tipo}', [
    'as' => 'index', 'uses' => 'antQuiruTrauController@index'
]);

Route::post('antecedentesginecologicos/store/{id}', [
    'as' => 'storeAG', 'uses' => 'antecedentesginecologicosController@storeAG'
]);

// Antecedentes Quirúrgicos Traumáticos -------------------------------------------------------------------------
Route::get('antQuiruTrau/createQT/{idExp}/{Tipo}', 'antQuiruTrauController@createQT')->name('createQT');
Route::post('antQuiruTrau/storeQT/{idExp}/{Tipo}', [
    'as' => 'storeQT', 'uses' => 'antQuiruTrauController@storeQT'
]);

Route::post('antQuiruTrau/editQT/{id}/{idExp}/{Tipo}', [
    'as' => 'editQT', 'uses' => 'antQuiruTrauController@editQT'
]);

Route::post('antQuiruTrau/updateQT/{id}/{idExp}/{Tipo}', [
    'as' => 'updateQT', 'uses' => 'antQuiruTrauController@updateQT'
]);

Route::delete('antQuiruTrau/deleteQT/{id}/{idExp}/{tipo}', [
    'as' => 'deleteQT', 'uses' => 'antQuiruTrauController@deleteQT'
]);
// ------------------------------------------------------------------------------------------------------------

Route::post('expediente/MenuAntecedentes/{id}/{Genero}', [
    'as' => 'MenuAntecedentes', 'uses' => 'expedienteController@MenuAntecedentes'
]);

Route::delete('antecedentesginecologicos/eliminar/{id}/{idExp}', [
    'as' => 'eliminar', 'uses' => 'antecedentesginecologicosController@eliminar'
]);

Route::delete('antecedentesginecologicos/eliminar/{id}/{idExp}', [
    'as' => 'eliminar', 'uses' => 'antecedentesginecologicosController@eliminar'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios', 'usuariosController');
Route::resource('experiencias', 'experienciasController');
Route::resource('pacientes', 'pacientesController');
Route::resource('expediente', 'expedienteController');
Route::resource('antQuiruTrau', 'antQuiruTrauController');
Route::resource('antecedentesginecologicos', 'antecedentesginecologicosController');
Route::get('/agenda', 'agendaController@index');
Route::get('/agenda/listar', 'agendaController@listar');
Route::post('/agenda/guardar', 'agendaController@guardar');
Route::post('/agenda/editar', 'agendaController@editar');
Route::post('/agenda/eliminar', 'agendaController@eliminar');
