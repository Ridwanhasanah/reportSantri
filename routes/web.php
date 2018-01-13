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

Route::get('/', function () {
    return view('welcome');
});

/*Dashboard*/
	Route::get('report/add', 'ActivityController@create')->name('report.add');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('report/all', 'ActivityController@index')->name('report.all');

Route::group(['middleware'=>'auth'], function(){ // itu midddleware web apaan? ga tw ane cuma ikut tuttor aja gan
	Route::resource('report', 'ActivityController');

	/*Dasboard*/
	Route::get('/adminPondok', function(){
	return view('dashboard.masterdashboard');
	});

	Route::get('/PondokIT', 'PondokitController@index')->name('dashboardIT');

	

	/*===== Report Start =====*/
	/*All Report*/
	Route::get('/report/all', 'ActivityController@index')->name('report.all');
	/*Add Report*/
	Route::get('/report/add', 'ActivityController@create')->name('report.add');
	Route::post('/report/add', 'ActivityController@store')->name('report.addstore');
	/*Delete Report*/
	Route::delete('/report/{id}/delete', 'ActivityController@destroy')->name('report.delete');
	/*Edit Report*/
	Route::get('report/{id}/edit', 'ActivityController@edit')->name('report.edit');
	Route::patch('report/{activity}/edit', 'ActivityController@update')->name('report.update');
	/*===== Report End =====*/


	/*===== Goal Start =====*/
	/*All Goal*/
	Route::get('/goals/all', 'GoalController@index')->name('goal.all');
	/*Add Goal*/
	Route::get('/goals/add', 'GoalController@create')->name('goal.add');
	Route::post('/goals/add', 'GoalController@store')->name('goal.addstore');
	/*Delete Goal*/
	Route::delete('/goals/{id}/delete', 'GoalController@destroy')->name('goal.delete');
	/*Edit Goal*/
	Route::get('goals/{id}/edit', 'GoalController@edit')->name('goal.edit');
	Route::patch('goals/{id}/edit', 'GoalController@update')->name('goal.update');
	/*===== Goal End =====*/


	

});