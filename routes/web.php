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
Route::get('personalsocial/create/{id}', 'personalsocialController@create')->name('createPS');
Route::get('antecedentesginecologicos/create/{id}', 'antecedentesginecologicosController@create')->name('create');


//Direcciones de las consultas
Route::get('consultas/index/{id}', 'consultasController@index')->name('indexConsulta');
Route::get('consultas/create/{id}', 'consultasController@create')->name('createConsulta');
Route::get('consultas/edit/{id}/{idExp}', 'consultasController@edit')->name('editConsulta');
Route::delete('consultas/delete/{id}/{idExp}', 'consultasController@destroy')->name('deleteConsulta');
Route::post('consultas/store/{id}', 'consultasController@store')->name('storeConsulta');
Route::patch('consultas/update/{id}/{idExp}', 'consultasController@update')->name('updateConsulta');



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

//Antecentes Enfermedades

Route::post('antNoPatologicos/indexNP/{idExp}', [
    'as' => 'indexNP', 'uses' => 'antNoPatologicosController@indexNP'
]);

Route::post('antPatologicos/indexP/{idExp}', [
    'as' => 'indexP', 'uses' => 'antPatologicosController@indexP'
]);

Route::get('antNoPatologicos/createNP/{idExp}', 'antNoPatologicosController@createNP')->name('createNP');

Route::get('antPatologicos/createP/{idExp}', 'antPatologicosController@createP')->name('createP');

Route::post('antNoPatologicos/storeNP/{idExp}', [
    'as' => 'storeNP', 'uses' => 'antNoPatologicosController@storeNP'
]);

Route::post('antPatologicos/storeP/{idExp}', [
    'as' => 'storeP', 'uses' => 'antPatologicosController@storeP'
]);


Route::post('antNoPatologicos/updateNP/{id}/{idExp}', [
    'as' => 'updateNP', 'uses' => 'antNoPatologicosController@updateNP'
]);

Route::post('antPatologicos/updateP/{id}/{idExp}', [
    'as' => 'updateP', 'uses' => 'antPatologicosController@updateP'
]);

Route::post('antNoPatologicos/editNP/{id}/{idExp}', [
    'as' => 'editNP', 'uses' => 'antNoPatologicosController@editNP'
]);

Route::post('antPatologicos/editP/{id}/{idExp}', [
    'as' => 'editP', 'uses' => 'antPatologicosController@editP'
]);

Route::delete('antNoPatologicos/deleteNP/{id}/{idExp}', [
    'as' => 'deleteNP', 'uses' => 'antNoPatologicosController@deleteNP'
]);

Route::delete('antPatologicos/deleteP/{id}/{idExp}', [
    'as' => 'deleteP', 'uses' => 'antPatologicosController@deleteP'
]);


//------------------------------------------------------------------------------------
// Personal Social
Route::post('personalsocial/indexPS/{idExp}', [
    'as' => 'indexPS', 'uses' => 'personalsocialController@indexPS'
]);

Route::post('personalsocial/storePS/{idExp}', [
    'as' => 'storePS', 'uses' => 'personalsocialController@storePS'
]);

Route::post('personalsocial/updatePS/{id}/{idExp}', [
    'as' => 'updatePS', 'uses' => 'personalsocialController@updatePS'
]);

Route::post('personalsocial/editPS/{id}/{idExp}', [
    'as' => 'editPS', 'uses' => 'personalsocialController@editPS'
]);

Route::delete('personalsocial/deletePS/{id}/{idExp}', [
    'as' => 'deletePS', 'uses' => 'personalsocialController@deletePS'
]);

//--------------------------------------------------------------------------

// Examenes

Route::post('examenes/indexEx/{idCon}', [
    'as' => 'indexEx', 'uses' => 'examenesController@indexEx'
]);

Route::post('examenes/storeEx/{idCon}', [
    'as' => 'storeEx', 'uses' => 'examenesController@storeEx'
]);

Route::post('examenes/updateEx/{id}/{idCon}', [
    'as' => 'updateEx', 'uses' => 'examenesController@updateEx'
]);

Route::post('examenes/editEx/{id}/{idCon}', [
    'as' => 'editEx', 'uses' => 'examenesController@editEx'
]);

Route::delete('examenes/deletePS/{id}/{idCon}', [
    'as' => 'deleteEx', 'uses' => 'examenesController@deleteEx'
]);

//-----------------------------------------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('usuarios', 'usuariosController');
Route::resource('experiencias', 'experienciasController');
Route::resource('pacientes', 'pacientesController');
Route::resource('antenfermedades', 'antenfermedadesController');
Route::resource('antNoPatologicos', 'antNoPatologicosController');
Route::resource('antPatologicos', 'antPatologicosController');
Route::resource('expediente', 'expedienteController');
Route::resource('antQuiruTrau', 'antQuiruTrauController');
Route::resource('personalsocial', 'personalsocialController');
Route::resource('examenes', 'examenesController');
Route::resource('antecedentesginecologicos', 'antecedentesginecologicosController');
Route::get('/agenda', 'agendaController@index');
Route::get('/agenda/listar', 'agendaController@listar');
Route::post('/agenda/guardar', 'agendaController@guardar');
Route::post('/agenda/editar', 'agendaController@editar');
Route::post('/agenda/eliminar', 'agendaController@eliminar');
