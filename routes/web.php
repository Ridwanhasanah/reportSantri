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

Auth::routes();


Route::group(['middleware'=>'auth'], function(){ 
	// Route::resource('report', 'ActivityController');

	/*Dasboard*/
	Route::get('/home', 'PondokitController@index')->name('dashboardIT');
	

	Route::get('/adminPondok', 'PondokitController@index')->name('dashboardIT');

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

	/*===== Profile Start ===== */
	Route::get('profile','ProfileController@index')->name('profile');
	/*Edit*/
	Route::get('profile/{id}/edit','ProfileController@edit')->name('profile.edit');
	Route::patch('profile/{id}/edit','ProfileController@update')->name('profile.update');

	/*===== Profile End ===== */

	Route::group(['middleware'=>'check_user'], function(){ 

		Route::resources([
			'user' => 'AllUserController'
		]);
		
	});

	/*Admin Start*/
	/*All User*/
	// Route::get('alluser','AllUserController@index')->name('alluser');
	// /*Create*/
	// Route::get('user/add','AllUserController@create')->name('user.add');
	// Route::post('user/add','AllUserController@store')->name('user.addstore');
	// /*Edit*/
	// Route::get('user/{id}/edit','AllUserController@edit')->name('user.edit');
	// Route::patch('user/{id}/edit','AllUserController@update')->name('user.update');
	// /*Detail*/
	// Route::get('user/{id}/detail','AllUserController@show')->name('user.detail');
	// /*Delete*/
	// Route::delete('user/{id}/delete','AllUserController@destroy')->name('user.destroy');
	// /*Admin End*/

	

});