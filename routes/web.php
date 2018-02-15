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
    return view('auth.login');
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

	/*===== 100 Dream Start ===== */
	Route::get('/100dream','ProfileController@dreamIndex')->name('dream');
	/*Edit*/
	Route::get('dream/{id}/edit','ProfileController@dreamEdit')->name('dream.edit');
	Route::patch('dream/{id}/edit','ProfileController@dreamUpdate')->name('dream.update');
	/*===== 100 Dream End ===== */

	/*===== Target Terdekat Start ===== */
	Route::get('/target','ProfileController@targetIndex')->name('target');
	/*Edit*/
	Route::get('target/{id}/edit','ProfileController@targetEdit')->name('target.edit');
	Route::patch('target/{id}/edit','ProfileController@targetUpdate')->name('target.update');
	/*===== Target Terdekat End ===== */

	/*===== Amaliyah Start ===== */
	Route::get('amaliyahcheck', 'AmaliyahController@checkAmaliyah')->name('amaliyahcheck');
	Route::get('amaliyah', 'AmaliyahController@index')->name('amaliyah.index');
	// create
	Route::get('amaliyah/create', 'AmaliyahController@create')->name('amaliyah.create');
	Route::post('amaliyah/create', 'AmaliyahController@store')->name('amaliyah.store');
	// edit
	// Route::get('amaliyah/edit', 'AmaliyahController@update')->name('amaliyah.edit');
	Route::patch('amaliyah/edit/{id}', 'AmaliyahController@update')->name('amaliyah.update');
	/*===== Amaliyah End ===== */

	/*===== Kirim Saran Start=====*/
	Route::resources([
		'suggestion' => 'SuggestionController'
	]);
	
	/*===== Kirim Saran End=====*/
	


	/*=============================================================================================*/
	/*======================================== Admin Start ========================================*/
	/*=============================================================================================*/
	Route::group(['middleware'=>'check_user'], function(){ /*Auth untuk chek admin atau bukan*/
	/*All Divisi*/
	Route::get('user/programmer','AllUserController@santriProgrammer')->name('user.programmer');
	Route::get('user/multimedia','AllUserController@santriMultimedia')->name('user.multimedia');
	Route::get('user/imers','AllUserController@santriImers')->name('user.imers');
	Route::get('user/cyber','AllUserController@santriCyber')->name('user.cyber');
	Route::get('user/staff','AllUserController@index')->name('user.staff');

	/*===== Acitivity Santri CRUD For Admin Access Start =====*/
	/*Index*/
	Route::get('santri/report/{id}','AllUserController@indexActivtySantri')->name('santri.report');
	/*Create*/
	Route::get('santri/createreport/{id}','AllUserController@createActivitySantri')->name('santri.createreport');
	/*Store*/
	Route::post('santri/createreport/{id}','AllUserController@storeActivitySantri')->name('santri.storereport');
	/*===== Acitivity Santri CRUD For Admin Access End =====*/

	/*===== Goal Santri CRUD For Admin Access Start =====*/
	/*Index*/
	Route::get('santri/goal/{id}','AllUserController@indexGoalSantri')->name('santri.goal');
	/*Create*/
	Route::get('santri/creategoal/{id}','AllUserController@createGoalSantri')->name('santri.creategoal');
	/*Store*/
	Route::post('santri/creategoal/{id}','AllUserController@storeGoalSantri')->name('santri.storegoal');
	/*===== Goal Santri CRUD For Admin Access End =====*/

	/*===== All Activity Goal Start=====*/ 
	Route::get('allgoalactivity/{id}', 'AllActivityGoalController@index')->name('allactivitygoal');
	/*===== All Activity Goal End=====*/
	
	/*===== Daily Activity  Start=====*/ 
	Route::get('dailyactivity', 'Admin\DailyActivityController@index')->name('dailyactivity');
	/*===== Daily Activity  End=====*/ 

	/*===== Amaliyah Santri Start =====*/
	Route::get('amaliyah/santri/{id}', 'AllUserController@amaliyahIndex')->name('santri.amaliyah');
	/*===== Amaliyah Santri End =====*/


	
	/*Route Admin, route ini sudah termasuk CRUD karna ini Route::reosurce lebih jelas liat dok laravel*/
	Route::resources([
			'user' => 'AllUserController'
		]);
	

	});

	/*=============================================================================================*/
	/*======================================== Admin End ==========================================*/
	/*=============================================================================================*/
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