<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::middleware(['auth'])->group(function(){

//roles
	Route::post('roles/store','RoleController@store')->name('roles.store')
			->middleware('has.permission:roles.create');

	Route::get('roles','RoleController@index')->name('roles.index')
			->middleware('has.permission:roles.index');

	Route::get('roles/create','RoleController@create')->name('roles.create')
			->middleware('has.permission:roles.create');

	Route::put('roles/{role}','RoleController@update')->name('roles.update')
			->middleware('has.permission:roles.edit');

	Route::get('roles/{role}','RoleController@show')->name('roles.show')
			->middleware('has.permission:roles.show');

	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
			->middleware('has.permission:roles.destroy');

	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
			->middleware('has.permission:roles.edit');

//permisos
	Route::post('permisos/store','PermissionController@store')->name('permision.store')
			->middleware('has.permission:permision.create');

	Route::get('permisos','PermissionController@index')->name('permision.index')
			->middleware('has.permission:permision.index');

	Route::get('permisos/create','PermissionController@create')->name('permision.create')
			->middleware('has.permission:permision.create');

	Route::put('permisos/{permiso}','PermissionController@update')->name('permision.update')
			->middleware('has.permission:permision.edit');


	Route::get('permisos/{permiso}','PermissionController@show')->name('permision.show')
			->middleware('has.permission:permision.show');

	Route::delete('permisos/{permiso}','PermissionController@destroy')->name('permision.destroy')
			->middleware('has.permission:permision.destroy');

	Route::get('permisos/{permiso}/edit','PermissionController@edit')->name('permision.edit')
			->middleware('has.permission:permision.edit');


//Usuarios
	Route::post('users/store','UserController@store')->name('user.store')
			->middleware('has.permission:user.store');

	Route::get('users','UserController@index')->name('user.index')
			->middleware('has.permission:user.index');

	Route::get('users/create','UserController@create')->name('user.create')
			->middleware('has.permission:user.create');

	Route::put('users/{id}','UserController@update')->name('user.update')
			->middleware('has.permission:user.edit');

	Route::get('users/{id}','UserController@show')->name('user.show')
			->middleware('has.permission:user.show');

	Route::delete('users/{id}','UserController@destroy')->name('user.destroy')
			->middleware('has.permission:user.destroy');

	Route::get('users/{id}/edit','UserController@edit')->name('user.edit')
			->middleware('has.permission:user.edit');

	Route::get('user_list_pdf','UserController@exportPdf')->name('user.pdf')
					->middleware('has.permission:user.create');

//solicitud
	Route::post('solicitud/store','SolicitudController@store')->name('solicitud.store')
			->middleware('has.permission:solicitud.create');

	Route::get('solicitud','SolicitudController@index')->name('solicitud.index')
			->middleware('has.permission:solicitud.index');

	Route::get('solicitud/create','SolicitudController@create')->name('solicitud.create')
			->middleware('has.permission:solicitud.create');

	Route::put('solicitud/{id}','SolicitudController@update')->name('solicitud.update')
			->middleware('has.permission:solicitud.edit');

	Route::put('solicitud/{id}','SolicitudController@updateStates')->name('solicitud.updateStates')
					->middleware('has.permission:solicitud.updateStates');

	Route::get('solicitud/{id}','SolicitudController@show')->name('solicitud.show')
			->middleware('has.permission:solicitud.show');

	Route::delete('solicitud/{id}','SolicitudController@destroy')->name('solicitud.destroy')
			->middleware('has.permission:solicitud.destroy');

	Route::get('solicitud/{id}/edit','SolicitudController@edit')->name('solicitud.edit')
			->middleware('has.permission:solicitud.edit');

	Route::get('solicitud/ValidarPermiso','SolicitudController@ValidarPermiso')->name('solicitud.ValidarPermiso')
		 		 ->middleware('has.permission:solicitud.ValidarPermiso');

  Route::post('solicitud/ValidarPermiso','SolicitudController@ValidarPermiso')->name('solicitud.ValidarPermiso')
		 		 ->middleware('has.permission:solicitud.ValidarPermiso');


//Licencias

	Route::post('licencia/store','LicenciaController@store')->name('licencia.store')
			->middleware('has.permission:licencia.create');

	Route::get('licencia','LicenciaController@index')->name('licencia.index')
			->middleware('has.permission:licencia.index');

	Route::get('licencia/create','LicenciaController@create')->name('licencia.create')
			->middleware('has.permission:licencia.create');

	Route::put('licencia/{id}','LicenciaController@update')->name('licencia.update')
			->middleware('has.permission:licencia.edit');

	Route::get('licencia/{id}','LicenciaController@show')->name('licencia.show')
			->middleware('has.permission:licencia.show');

	Route::delete('licencia/{id}','LicenciaController@destroy')->name('licencia.destroy')
			->middleware('has.permission:licencia.destroy');

	Route::get('licencia/{id}/edit','LicenciaController@edit')->name('licencia.edit')
			->middleware('has.permission:licencia.edit');



//Asistencia

	Route::post('asistencia/store','AsistenciaController@store')->name('asistencia.store')
			->middleware('has.permission:asistencia.create');

	Route::get('asistencia','AsistenciaController@index')->name('asistencia.index')
			->middleware('has.permission:asistencia.index');

	Route::get('asistencia/create','AsistenciaController@create')->name('asistencia.create')
			->middleware('has.permission:asistencia.create');

	Route::put('asistencia/{id}','AsistenciaController@update')->name('asistencia.update')
			->middleware('has.permission:asistencia.edit');

	Route::get('asistencia/{id}','AsistenciaController@show')->name('asistencia.show')
			->middleware('has.permission:asistencia.show');

	Route::delete('asistencia/{id}','AsistenciaController@destroy')->name('asistencia.destroy')
			->middleware('has.permission:asistencia.destroy');

	Route::get('asistencia/{id}/edit','AsistenciaController@edit')->name('asistencia.edit')
			->middleware('has.permission:asistencia.edit');


//Semestres

				Route::post('semestre/store','SemestreController@store')->name('semestre.store')
						->middleware('has.permission:semestre.create');

				Route::get('semestre','SemestreController@index')->name('semestre.index')
						->middleware('has.permission:semestre.index');

				Route::get('semestre/create','SemestreController@create')->name('semestre.create')
						->middleware('has.permission:semestre.create');

				Route::put('semestre/{id}','SemestreController@update')->name('semestre.update')
						->middleware('has.permission:semestre.edit');

				Route::get('semestre/{id}','SemestreController@show')->name('semestre.show')
						->middleware('has.permission:semestre.show');

				Route::delete('semestre/{id}','SemestreController@destroy')->name('semestre.destroy')
						->middleware('has.permission:semestre.destroy');

				Route::get('semestre/{id}/edit','SemestreController@edit')->name('semestre.edit')
						->middleware('has.permission:semestre.edit');



//chekear permisos


					Route::get('workpermit','WorkpermitController@index')->name('workpermit.index')
							->middleware('has.permission:permission.index');

					Route::put('workpermit/{id}','WorkpermitController@update')->name('workpermit.update')
							->middleware('has.permission:workpermit.edit');

					Route::get('workpermit/{id}','WorkpermitController@show')->name('workpermit.show')
							->middleware('has.permission:workpermit.show');

					Route::delete('workpermit/{id}','WorkpermitController@destroy')->name('workpermit.destroy')
							->middleware('has.permission:workpermit.destroy');

					Route::get('workpermit/{id}/edit','WorkpermitController@edit')->name('workpermit.edit')
							->middleware('has.permission:workpermit.edit');

			//reportes
					Route::get('report','ReportController@index')->name('report.index')
							->middleware('has.permission:report.index');

					// Route::put('workpermit/{id}','WorkpermitController@update')->name('workpermit.update')
					// 		->middleware('has.permission:workpermit.edit');
					//
					Route::get('report/filtro','ReportController@busqueda')->name('report.show')
							->middleware('has.permission:report.show');
					//
					// Route::delete('workpermit/{id}','WorkpermitController@destroy')->name('workpermit.destroy')
					// 		->middleware('has.permission:workpermit.destroy');
					//
					// Route::get('workpermit/{id}/edit','WorkpermitController@edit')->name('workpermit.edit')
					// 		->middleware('has.permission:permission.edit');
});



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


	Route::resource('solicitud', 'SolicitudController');


});
