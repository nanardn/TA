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
/*
Route::group(array('before' => 'auth'), function()
{
	Route::get('/home', 'HomeController@index');
	Route::get('logout', array('uses' => 'RegistrationController@logout'));
});
*/	
Route::get('/', function () {
    return view('auth.login');
});
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/dashboard/pendanaan/{id}','crowdController@index');
Route::get('/dashboard/daftarpenggalangan','daftarPendanaanController@showpage');
Route::post('uploadpendanaan','daftarPendanaanController@uploadpendanaan');
Route::get('/dashboard/showReportCrowdfunding','crowdController@showReport');
Route::get('/dashboard/showReportPendanaan','crowdController@listReportCrowd');
Route::get('/detailReportCrowd','crowdController@showDetailReport');
Route::get('/dashboard/listPenggalangan','crowdController@getAllPendanaanAdmin');
Route::get('/dashboard/detail_laporan_crowdfunding/{id}','crowdController@detailReport');