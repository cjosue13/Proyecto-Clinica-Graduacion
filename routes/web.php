<?php

use Illuminate\Support\Facades\Route;

use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
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

/*Route::get('/reportes', function () {
    return view('reportes');
})->name('reportes');*/

Route::get('/auth', function () {
    return view('auth.register');
})->name('auth');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Reportes PDF
Route::get('pacientes/pdf/{id}', 'pacientesController@createPDF')->name('pacientePDF');
Route::get('consultas/pdf/{id}', 'consultasController@createPDF')->name('consultaPDF');
Route::get('agenda/pdf', 'agendaController@createPDF')->name('agendaPDF');
Route::get('examen/pdf/{id}', 'examenesController@createPDF')->name('examenPDF');
Route::get('reportes', 'reportesController@index')->name('reportes');
Route::get('reportes/consultas', 'reportesController@consultas')->name('reporteConsultas');


Route::get('pdf2', 'ReportGeneratorController@ReporteEmpleos')->name('pdf2'); //ReporteEmpresa
Route::get('pdf3/{user}', 'ReportGeneratorController@ReporteEmpresa')->name('pdf3'); //ReporteEmpresa
Route::get('pdf4/{user}', 'ReportGeneratorController@ReporteOferta')->name('pdf4'); //Reporteoferta
Route::get('pdf5', 'ReportGeneratorController@ReporteGrafico')->name('pdf5'); //ReporteGrafico

Route::post('usuarios/save', 'usuariosController@save');

Route::get('pacientes/filtro/', [
    'as' => 'filtro', 'uses' => 'pacientesController@filtro'
]);

Route::get('pacientes/VerExpediente/{id}', 'pacientesController@VerExpediente')->name('VerExpediente');

Route::get('pdf5', 'ReportGeneratorController@ReporteGrafico')->name('pdf5'); //ReporteGrafico
Route::get('expediente/VerAntecedenteGinecologico/{id}', 'expedienteController@VerAntecedenteGinecologico')->name('VerAntecedenteGinecologico');
Route::get('expediente/create/{id}', 'expedienteController@create')->name('createExp');
Route::get('expediente/edit/{id}/{idPac}', 'expedienteController@edit')->name('editExp');

Route::get('personalsocial/create/{id}', 'personalsocialController@create')->name('createPS');
Route::get('antecedentesginecologicos/create/{id}', 'antecedentesginecologicosController@create')->name('create');

Route::get('examenes/create/{idCon}/{idExp}', 'examenesController@create')->name('createEx');
Route::get('examenesclinicos/createEC/{idCon}/{idExp}', 'examenesclinicosController@createEC')->name('createEC');
Route::get('exmcardiovasculares/createECAR/{exm_id}/{idCon}/{idExp}', 'exmCardioController@createECAR')->name('createECAR');
Route::get('exmsistemasdigestivos/createEDIS/{exm_id}/{id_con}/{id_exp}', 'exmDigestivoController@createEDIS')->name('createEDIS');
Route::get('exmsistemasnerviosos/createESN/{exm_id}/{id_con}/{id_exp}', 'exmNerviosoController@createESN')->name('createESN');
Route::get('apariencias/createAPAR/{exm_id}/{id_con}/{id_exp}', 'aparecienciasController@createAPAR')->name('createAPAR');



//Direcciones de las consultas
Route::get('consultas/index/{id}', 'consultasController@index')->name('indexConsulta');
Route::get('consultas/create/{id}', 'consultasController@create')->name('createConsulta');
Route::get('consultas/edit/{id}/{idExp}', 'consultasController@edit')->name('editConsulta');
Route::delete('consultas/delete/{id}/{idExp}', 'consultasController@destroy')->name('deleteConsulta');
Route::post('consultas/store/{id}', 'consultasController@store')->name('storeConsulta');



Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');

Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');


Route::patch('consultas/update/{id}/{idExp}', 'consultasController@update')->name('updateConsulta');



Route::post('expediente/store/{id}', [
    'as' => 'store', 'uses' => 'expedienteController@store'
]);



Route::get('antQuiruTrau/index/{idExp}/{Tipo}', [
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

Route::post('expediente/MenuAntecedentes/{id}/{Genero}/{Nombre}/{Apellido}/{pac_id}', [
    'as' => 'MenuAntecedentes', 'uses' => 'expedienteController@MenuAntecedentes'
]);

Route::delete('antecedentesginecologicos/eliminar/{id}/{idExp}', [
    'as' => 'eliminar', 'uses' => 'antecedentesginecologicosController@eliminar'
]);

Route::post('antecedentesginecologicos/edit/{id}/{idExp}', [
    'as' => 'edit', 'uses' => 'antecedentesginecologicosController@edit'
]);

Route::post('antecedentesginecologicos/updateAG/{id}/{idExp}', [
    'as' => 'updateAG', 'uses' => 'antecedentesginecologicosController@updateAG'
]);

//Antecentes Enfermedades

Route::get('antNoPatologicos/indexNP/{idExp}', [
    'as' => 'indexNP', 'uses' => 'antNoPatologicosController@indexNP'
]);

Route::get('antPatologicos/indexP/{idExp}', [
    'as' => 'indexP', 'uses' => 'antPatologicosController@indexP'
]);

Route::get('antHeredoFamiliares/indexHF/{idExp}', [
    'as' => 'indexHF', 'uses' => 'antHeredoFamiliaresController@indexHF'
]);

Route::get('antNoPatologicos/createNP/{idExp}', 'antNoPatologicosController@createNP')->name('createNP');

Route::get('antPatologicos/createP/{idExp}', 'antPatologicosController@createP')->name('createP');

Route::get('antHeredoFamiliares/createHF/{idExp}', 'antHeredoFamiliaresController@createHF')->name('createHF');

Route::post('antNoPatologicos/storeNP/{idExp}', [
    'as' => 'storeNP', 'uses' => 'antNoPatologicosController@storeNP'
]);

Route::post('antPatologicos/storeP/{idExp}', [
    'as' => 'storeP', 'uses' => 'antPatologicosController@storeP'
]);

Route::post('antHeredoFamiliares/storeHF/{idExp}', [
    'as' => 'storeHF', 'uses' => 'antHeredoFamiliaresController@storeHF'
]);

Route::post('antNoPatologicos/updateNP/{id}/{idExp}', [
    'as' => 'updateNP', 'uses' => 'antNoPatologicosController@updateNP'
]);

Route::post('antPatologicos/updateP/{id}/{idExp}', [
    'as' => 'updateP', 'uses' => 'antPatologicosController@updateP'
]);

Route::post('antHeredoFamiliares/updateHF/{id}/{idExp}', [
    'as' => 'updateHF', 'uses' => 'antHeredoFamiliaresController@updateHF'
]);

Route::post('antNoPatologicos/editNP/{id}/{idExp}', [
    'as' => 'editNP', 'uses' => 'antNoPatologicosController@editNP'
]);

Route::post('antPatologicos/editP/{id}/{idExp}', [
    'as' => 'editP', 'uses' => 'antPatologicosController@editP'
]);

Route::post('antHeredoFamiliares/editHF/{id}/{idExp}', [
    'as' => 'editHF', 'uses' => 'antHeredoFamiliaresController@editHF'
]);

Route::delete('antNoPatologicos/deleteNP/{id}/{idExp}', [
    'as' => 'deleteNP', 'uses' => 'antNoPatologicosController@deleteNP'
]);

Route::delete('antPatologicos/deleteP/{id}/{idExp}', [
    'as' => 'deleteP', 'uses' => 'antPatologicosController@deleteP'
]);

Route::delete('antHeredoFamiliares/deleteHF/{id}/{idExp}', [
    'as' => 'deleteHF', 'uses' => 'antHeredoFamiliaresController@deleteHF'
]);

//------------------------------------------------------------------------------------
// Personal Social
Route::get('personalsocial/indexPS/{idExp}', [
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

Route::get('examenes/indexEx/{idCon}/{idExp}', [
    'as' => 'indexEx', 'uses' => 'examenesController@indexEx'
]);

Route::post('examenes/storeEx/{idCon}/{idExp}', [
    'as' => 'storeEx', 'uses' => 'examenesController@storeEx'
]);

Route::post('examenes/updateEx/{id}/{idCon}/{idExp}', [
    'as' => 'updateEx', 'uses' => 'examenesController@updateEx'
]);

Route::post('examenes/editEx/{id}/{idCon}/{idExp}', [
    'as' => 'editEx', 'uses' => 'examenesController@editEx'
]);

Route::post('image-upload/{id}/{idCon}/{idExp}', 'examenesController@imageUploadPost')->name('upload-image');

Route::delete('examenes/deleteEx/{id}/{idCon}/{idExp}', [
    'as' => 'deleteEx', 'uses' => 'examenesController@deleteEx'
]);
//--------------------------------------------------

//Examenes Clínicos
Route::get('examenesclinicos/indexEC/{idCon}/{idExp}', [
    'as' => 'indexEC', 'uses' => 'examenesclinicosController@indexEC'
]);

Route::get('exmcardiovasculares/indexECAR/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'indexECAR', 'uses' => 'exmCardioController@indexECAR'
]);

Route::get('exmsistemasdigestivos/indexEDIS/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'indexEDIS', 'uses' => 'exmDigestivoController@indexEDIS'
]);

Route::get('exmsistemasnerviosos/indexESN/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'indexESN', 'uses' => 'exmNerviosoController@indexESN'
]);

Route::get('apariencias/indexAPAR/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'indexAPAR', 'uses' => 'aparecienciasController@indexAPAR'
]);

Route::post('examenesclinicos/storeEC/{idCon}/{idExp}', [
    'as' => 'storeEC', 'uses' => 'examenesclinicosController@storeEC'
]);

Route::post('exmcardiovasculares/storeECAR/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'storeECAR', 'uses' => 'exmCardioController@storeECAR'
]);

Route::post('exmsistemasdigestivos/storeEDIS/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'storeEDIS', 'uses' => 'exmDigestivoController@storeEDIS'
]);

Route::post('exmsistemasnerviosos/storeESN/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'storeESN', 'uses' => 'exmNerviosoController@storeESN'
]);

Route::post('apariencias/storeAPAR/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'storeAPAR', 'uses' => 'aparecienciasController@storeAPAR'
]);


Route::post('examenesclinicos/updateEx/{id}/{idCon}/{idExp}', [
    'as' => 'updateEC', 'uses' => 'examenesclinicosController@updateEC'
]);

Route::post('exmsistemasdigestivos/updateEDIS/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'updateEDIS', 'uses' => 'exmDigestivoController@updateEDIS'
]);

Route::post('exmsistemasnerviosos/updateESN/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'updateESN', 'uses' => 'exmNerviosoController@updateESN'
]);

Route::post('apariencias/updateAPAR/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'updateAPAR', 'uses' => 'aparecienciasController@updateAPAR'
]);

Route::post('exmcardiovasculares/updateECAR/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'updateECAR', 'uses' => 'exmCardioController@updateECAR'
]);



Route::post('examenesclinicos/editEC/{id}/{idCon}/{idExp}', [
    'as' => 'editEC', 'uses' => 'examenesclinicosController@editEC'
]);

Route::post('exmsistemasdigestivos/editEDIS/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'editEDIS', 'uses' => 'exmDigestivoController@editEDIS'
]);

Route::post('exmsistemasnerviosos/editESN/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'editESN', 'uses' => 'exmNerviosoController@editESN'
]);

Route::post('apariencias/editAPAR/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'editAPAR', 'uses' => 'aparecienciasController@editAPAR'
]);


Route::delete('examenes/deleteEC/{id}/{idCon}/{idExp}', [
    'as' => 'deleteEC', 'uses' => 'examenesclinicosController@deleteEC'
]);

Route::post('exmcardiovasculares/editECAR/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'editECAR', 'uses' => 'exmCardioController@editECAR'
]);

Route::delete('exmcardiovasculares/deleteECAR/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'deleteECAR', 'uses' => 'exmCardioController@deleteECAR'
]);

Route::delete('exmsistemasdigestivos/deleteEDIS/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'deleteEDIS', 'uses' => 'exmDigestivoController@deleteEDIS'
]);

Route::delete('apariencias/deleteAPAR/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'deleteAPAR', 'uses' => 'aparecienciasController@deleteAPAR'
]);

Route::delete('exmsistemasnerviosos/deleteESN/{id}/{exm_id}/{id_con}/{id_exp}', [
    'as' => 'deleteESN', 'uses' => 'exmNerviosoController@deleteESN'
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
Route::resource('sistemadigestivos', 'sistemadigestivoController');
Route::resource('sistemanerviosos', 'sistemanerviosoController');
Route::resource('antNoPatologicos', 'antNoPatologicosController');
Route::resource('antPatologicos', 'antPatologicosController');
Route::resource('antHeredoFamiliares', 'antHeredoFamiliaresController');
Route::resource('expediente', 'expedienteController');
Route::resource('antQuiruTrau', 'antQuiruTrauController');
Route::resource('personalsocial', 'personalsocialController');
Route::resource('antecedentesginecologicos', 'antecedentesginecologicosController');


Route::resource('examenesclinicos', 'examenesclinicosController');
Route::resource('examenes', 'examenesController');

Route::get('/agenda', 'agendaController@index')->name('agenda');
Route::get('/agenda/listar', 'agendaController@listar');
Route::post('/guardarCalendar', 'agendaController@guardar')->name('guardarCalendar');
Route::post('/agenda/editar', 'agendaController@editar');
Route::post('/agenda/eliminar', 'agendaController@eliminar');