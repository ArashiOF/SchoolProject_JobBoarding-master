<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index') )->middleware('verified');
//Auth::routes(); //si se usa este probablemente no tengas que verificar
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::post('agregarEmpresa', 'HomeController@agregarEmpresa')->middleware('auth');
Route::post('guardarEmpresa', 'HomeController@guardarEmpresa')->middleware('auth');

Route::post('agregarVacante', 'HomeController@agregarVacante')->middleware('auth');
Route::post('guardarVacante', 'MailController@guardarVacante')->middleware('auth');

Route::post('adminAgregarVacante', 'HomeController@adminAgregarVacante')->middleware('auth');

Route::get('verVacante/{id}', 'HomeController@verVacante')->middleware('auth');
Route::post('verVacante/{id}/aplicarVacante', 'MailController@aplicarVacante')->middleware('auth');

Route::post('verAdminVacante/{id}', 'HomeController@verAdminVacante')->middleware('auth');

Route::get('verAplicaciones/{id}', 'HomeController@verAplicaciones')->middleware('auth');

Route::post('agregarConocimiento', 'HomeController@agregarConocimiento')->middleware('auth');
Route::post('agregarHabilidad', 'HomeController@agregarHabilidad')->middleware('auth');

Route::post('agregarConocimientosDB', 'HomeController@agregarConocimientosDB')->middleware('auth');
Route::post('agregarHabilidadDB', 'HomeController@agregarHabilidadDB')->middleware('auth');

Route::post('agregarCurriculumDB', 'HomeController@agregarCurriculumDB')
->middleware('auth');

Route::get('login/google', array('as' => 'login/google', 'uses' => 'Auth\LoginController@redirectToProvider') );
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('actualizarAsp', 'HomeController@actualizarAsp')->middleware('auth');
Route::post('actualizarAsp2', 'HomeController@actualizarAsp2')->middleware('auth');

Route::post('actualizarEmp', 'HomeController@actualizarEmp')->middleware('auth');
Route::post('actualizarEmp2', 'HomeController@actualizarEmp2')->middleware('auth');

Route::post('cambiarEstado/{userid}/{vacanteid}', 'HomeController@cambiarEstado')->middleware('auth');
Route::post('cambiarEstado2', 'MailController@cambiarEstado2')->middleware('auth');

Route::get('bajaVacante/{id}', 'HomeController@bajaVacante')->middleware('auth');

Route::post('verBitacoraCambio', 'HomeController@verBitacoraCambio')->middleware('auth');
Route::post('verBitacoraTodo', 'HomeController@verBitacoraTodo')->middleware('auth');

Route::post('verEmpresa/{id}', 'HomeController@verEmpresa')->middleware('auth');

Route::post('guardarIdioma', 'HomeController@guardarIdioma')->middleware('auth');

Route::post('storage/create', 'StorageController@save');

Route::post('estadisticas2', 'HomeController@estadisticas2')
->name('estadisticas2');

Route::group(['middleware' => 'verified'], function () {

	Route::get('misGrupos', 'HomeController@misGrupos')
	->name('misGrupos');

	Route::get('publicos', 'HomeController@publicos')
	->name('publicos');

	Route::get('misMensajes', 'HomeController@misMensajes')
	->name('misMensajes');

	Route::get('misMisiones', 'HomeController@misMisiones')
	->name('misMisiones');

	Route::get('empresas', 'HomeController@getEmpresas')
	->name('empresas');

	Route::get('vacantes', 'HomeController@getVacantes')
	->name('vacantes');

	Route::get('adminVacantes', 'HomeController@getadminVacantes')
	->name('adminVacantes');

	Route::get('agregarVacante', 'HomeController@agregarVacante')
	->name('agregarVacante');

	Route::get('adminAgregarVacante', 'HomeController@adminAgregarVacante')
	->name('adminAgregarVacante');

	Route::get('agregarConocimientosDB', 'HomeController@agregarConocimientosDB')
	->name('agregarConocimientosDB');

	Route::get('agregarHabilidadDB', 'HomeController@agregarHabilidadDB')
	->name('agregarHabilidadDB');

	Route::get('asignados', 'HomeController@getAsignados')
	->name('asignados');

	Route::get('registroConocimiento', 'HomeController@getConocimientos')
	->name('registroConocimiento');

	Route::get('registroHabilidad', 'HomeController@getHabilidades')
	->name('registroHabilidad');

	Route::get('registroIdioma', 'HomeController@registrarIdioma')
	->name('registroIdioma');
	
	Route::get('agregarCurriculumDB', 'HomeController@agregarCurriculumDB')
->name('agregarCurriculumDB');

	Route::get('estadisticas/', 'HomeController@estadisticas')
	->name('estadisticas');

	Route::get('mail/send', 'MailController@send');

	Route::get('formulario', 'StorageController@formulario');


	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'verified'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
