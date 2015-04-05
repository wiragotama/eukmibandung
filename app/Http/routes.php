<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('login', 'LoginController@index');
Route::post('login', array('uses' => 'LoginController@validateLogin'));
Route::get('logout', 'LoginController@logout');

Route::get('verifikasiUKMIndag', 'VerifikasiUKMIndagController@index');
Route::get('dashboardDinas', 'DashboardDinasController@index');
Route::get('CRUD_Dinas', 'CRUDPageController@index');

Route::get('createUKM', 'CreateController@ukm');
Route::get('createIndustri', 'CreateController@industri');
Route::post('createUKM', 'CreateController@createUKM');
Route::post('createIndustri', 'CreateController@createIndustri');

Route::get('deleteUKM', 'DeleteController@ukm');
Route::get('deleteIndustri', 'DeleteController@industri');
Route::get('deleteUKMQuery', 'DeleteController@deleteUKM');
Route::get('deleteIndustriQuery', 'DeleteController@deleteIndustri');

Route::get('updateUKM', 'UpdateController@updateUKMForm');
Route::get('updateIndustri', 'UpdateController@updateIndustriForm');
Route::get('updateVerifikasi', 'UpdateController@updateVerifikasiForm');
Route::post('updateUKM', 'UpdateController@updateUKM');
Route::post('updateIndustri', 'UpdateController@updateIndustri');
Route::post('updateVerifikasi', 'UpdateController@updateVerifikasi');
Route::get('listUKM', 'updateController@listUKM');
Route::get('listIndustri', 'updateController@listIndustri');
Route::get('listVerifikasi', 'updateController@listVerifikasi');

Route::get('updateUKMUKMIN', 'UpdateProfileController@index');
Route::get('updateIndustriUKMIN', 'UpdateProfileController@index');
Route::post('updateUKMUKMIN', 'UpdateProfileController@updateUKM');
Route::post('updateIndustriUKMIN', 'UpdateProfileController@updateIndustri');

Route::get('dashboardMessages', 'dashboardMessagesController@dinas');
Route::get('dashboardUKMINMessages', 'dashboardMessagesController@ukmin');

Route::get('dashboardUKMIN', function()
{
	return View::make('dashboardUKMIN');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
