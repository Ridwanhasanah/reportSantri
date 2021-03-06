<?php
Route::get('/', function(){
	return view('kakakAsuh.frontPage.homekka');
});

// Error page
Route::get('/404',function(){
	return view('404');
})->name('404');
Route::get('/405',function(){
	return view('404');
})->name('405');

Auth::routes();
/* Activate Email*/
Route::get('auth/activate','Auth\ActivationController@activate')->name('auth.activate');
/*Resend Activate Email*/
Route::get('auth/activate/resend','Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('auth/activate/resend','Auth\ActivationResendController@resend');

/*===== Form Register Start =====*/
Route::resource('kkaregis', 'Kka\RegisterController');
/*===== Form Register Start =====*/


Route::group(['middleware'=>['auth','role:student']], function(){  

	/*===== Dasboard Start =====*/
	Route::get('/home', 'PondokitController@index')->name('dashboard.home');
	// Route::get('/home', 'PondokitController@index')->name('dashboard.home');
	/*List santri*/
	Route::get('list/programmer','PondokitController@santriProgrammer')->name('list.programmer');
	Route::get('list/multimedia','PondokitController@santriMultimedia')->name('list.multimedia');
	Route::get('list/imers','PondokitController@santriImers')->name('list.imers');
	Route::get('list/cyber','PondokitController@santriCyber')->name('list.cyber');
	/*===== Dasboard End =====*/

	/*===== Activity Start =====*/
	Route::resource('activity', 'ActivityController');
	Route::get('api/activity','ActivityController@apiActivity')->name('api.activity');
	/*===== Activity End =====*/

	/*===== Goal Start =====*/
	Route::resource('goal', 'GoalController');
	Route::get('api/goal','GoalController@apiGoal')->name('api.goal');
	/*===== Goal End =====*/

	/*===== Profile Start ===== */
	Route::get('profile','ProfileController@index')->name('profile');
	// SHOW
	Route::get('profile/{id}','ProfileController@show')->name('profile.show');
	/*Edit*/
	Route::get('profile/{id}/edit','ProfileController@edit')->name('profile.edit');
	Route::patch('profile/{id}/edit','ProfileController@update')->name('profile.update');
	Route::get('profilepass/{id}/edit','ProfileController@passwordEdit')->name('profilepass.edit');
	Route::patch('profilepass/{id}/edit','ProfileController@passwordUpdate')->name('profilepass.update');

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

	/*===== Motor start =====*/
	Route::resource('motor','MotorController');
	Route::get('api/motor','MotorController@apiMotor')->name('api.motor');
	Route::get('done/motor/{id}','MotorController@done')->name('done.motor');
	/*===== Motor End =====*/

	/*====== Report to Foster Brother Start =========*/
	Route::resource('reporttoka','Kka\dashboard\ReportToKAController');
	Route::get('reporttoka/adikasuh/{id}','Kka\dashboard\ReportToKAController@allReportAdikAsuh')->name('reporttoka.adikasuh');
	/*====== Report to Foster Brother Start =========*/ 


	/*===== Kirim Saran Start=====*/
	Route::resources([
		'suggestion' => 'SuggestionController'
	]);
	/*===== Kirim Saran End=====*/
	
	/*=============================================================================================*/
	/*======================================== Caregiver Start ========================================*/
	/*=============================================================================================*/
	
	Route::get('kkasantri','Kka\dashboard\SantriController@index')->name('kka.santri');
	Route::get('charity','Kka\dashboard\SantriController@charity')->name('charity');

	Route::group(['middleware'=>['auth','role:foster_brother']], function(){
		Route::resource('caregiver','Kka\dashboard\CaregiverController');
		Route::resource('invoice','Kka\dashboard\invoice\InvoiceController');
		Route::get('api/invoice','Kka\dashboard\invoice\InvoiceController@apiInvoice')->name('api.invoice');
		Route::get('paket-amal/add/{id_santri}','Kka\dashboard\order\OrderController@create')->name('paket-amal.create');
		Route::post('paket-amal/add/{id_santri}','Kka\dashboard\order\OrderController@store')->name('paket-amal.store');
		/*Confirmation*/
		Route::get('konfirmasi','Kka\dashboard\invoice\ConfirmationController@create')->name('confirmation.create');
		Route::post('konfirmasi','Kka\dashboard\invoice\ConfirmationController@store')->name('confirmation.store');

		/** ===== Download Invoice ===== */
		Route::get('dowloadinvoice/{id}','Kka\dashboard\invoice\InvoiceController@downloadInvoice')->name('download.invoice');

		
		/*
		====== Adik Asuh Start =========
		*/ 
		// activity
		Route::get('activity/adik-asuh/{id}','Kka\dashboard\CaregiverController@indexActivtySantri')->name('adik.activity');
		//Api Activity apiActivtySantri
		Route::get('api-activity/adik-asuh/{id}','Kka\dashboard\CaregiverController@apiActivtySantri')->name('adik.api-activity');		
		//Taeget / Goal apiGoalSantri
		Route::get('target/adik-asuh/{id}','Kka\dashboard\CaregiverController@indexGoalSantri')->name('adik.target');
		//Api Target / Goal
		Route::get('api-target/adik-asuh/{id}','Kka\dashboard\CaregiverController@apiGoalSantri')->name('adik.api-target');				
		Route::get('amaliyah/adik-asuh/{id}','Kka\dashboard\CaregiverController@amaliyahIndex')->name('adik.amaliyah');

		/*
		====== Adik Asuh End =========
		*/ 
	});
	/*=============================================================================================*/
	/*======================================== Caregiver end ========================================*/
	/*=============================================================================================*/

	/*=============================================================================================*/
	/*======================================== Admin Start ========================================*/
	/*=============================================================================================*/
	// Route::group(['middleware'=>['auth','role:teacher']], function(){ /*Auth untuk chek admin atau bukan*/
	Route::group(['middleware'=>['auth','role:teacher']], function(){ /*Auth untuk chek admin atau bukan*/
		

		/*All Divisi*/
		Route::get('user/programmer','AllUserController@index')->name('user.programmer');
		Route::get('user/multimedia','AllUserController@index')->name('user.multimedia');
		Route::get('user/imers','AllUserController@index')->name('user.imers');
		Route::get('user/cyber','AllUserController@index')->name('user.cyber');
		Route::get('user/kka','AllUserController@index')->name('user.kka');
		// Delete Kakak asuh
		Route::delete('user/kka/{id}/delete','AllUserController@kkaDestroy')->name('user.kka.destroy');
		Route::get('user/staff','AllUserController@index')->name('user.staff');

		/*===== Acitivity Santri CRUD For The Admin Access Start =====*/
		/*Index*/
		Route::get('santri/report/{id}','AllUserController@indexActivtySantri')->name('santri.report');
		/*Create*/
		Route::get('santri/createreport/{id}','AllUserController@createActivitySantri')->name('santri.createreport');
		/*Store*/
		Route::post('santri/createreport/{id}','AllUserController@storeActivitySantri')->name('santri.storereport');
		/*Update*/
		Route::get('santri/editreport/{id}/edit','AllUserController@editActivitySantri')->name('santri.editreport');
		Route::patch('santri/editreport/{id}','AllUserController@updateActivitySantri')->name('santri.updatereport');
		/*Api*/
		Route::get('santri/report/api/{id}','AllUserController@apiActivtySantri')->name('santri.apireport');
		/*===== Acitivity Santri CRUD For Admin Access End =====*/

		/*===== Goal Santri CRUD For The Admin Access Start =====*/
		/*Index*/
		Route::get('santri/goal/{id}','AllUserController@indexGoalSantri')->name('santri.goal');
		/*Create*/
		Route::get('santri/creategoal/{id}','AllUserController@createGoalSantri')->name('santri.creategoal');
		/*Store*/
		Route::post('santri/creategoal/{id}','AllUserController@storeGoalSantri')->name('santri.storegoal');
		/*Update*/
		Route::get('santri/editgoal/{id}/edit','AllUserController@editGoalSantri')->name('santri.editgoal');
		Route::patch('santri/editgoal/{id}','AllUserController@updateGoalSantri')->name('santri.updategoal');
		/*Api*/
		Route::get('santri/goal/api/{id}','AllUserController@apiGoalSantri')->name('santri.apigoal');
		/*===== Goal Santri CRUD For Admin Access End =====*/

		/*===== All Activity Goal Start=====*/ 
		Route::get('allgoalactivity/{id}', 'AllActivityGoalController@index')->name('allactivitygoal');
		Route::get('api/activitysantri/{id}','AllActivityGoalController@apiActivity')->name('api.activitysantri');
		Route::get('api/goalsantri/{id}','AllActivityGoalController@apiGoal')->name('api.goalsantri');
		/*===== All Activity Goal End=====*/
		
		/*===== Daily Activity  Start=====*/ 
		Route::get('dailyactivity/All', 'Admin\DailyActivityController@index')->name('dailyactivity.All');
		Route::get('dailyactivity/Programmer', 'Admin\DailyActivityController@index')->name('dailyactivity.Programmer');
		Route::get('dailyactivity/Multimedia', 'Admin\DailyActivityController@index')->name('dailyactivity.Multimedia');
		Route::get('dailyactivity/Imers', 'Admin\DailyActivityController@index')->name('dailyactivity.Imers');
		Route::get('dailyactivity/Cyber', 'Admin\DailyActivityController@index')->name('dailyactivity.Cyber');
		//API DailyActivity
		Route::get('api/dailyactivity/All','Admin\DailyActivityController@apiDailyActivity')->name('api.dailyActivity');
		Route::get('api/dailyactivity/Programmer','Admin\DailyActivityController@apiDailyActivityProgrammer')->name('api.dailyActivity.Programmer');
		Route::get('api/dailyactivity/Multimedia','Admin\DailyActivityController@apiDailyActivityMultimedia')->name('api.dailyActivity.Multimedia');
		Route::get('api/dailyactivity/Imers','Admin\DailyActivityController@apiDailyActivityImers')->name('api.dailyActivity.Imers');
		Route::get('api/dailyactivity/Cyber','Admin\DailyActivityController@apiDailyActivityCyber')->name('api.dailyActivity.Cyber');
		// Belum Laporan Harian
		Route::get('notReportActivity/All','Admin\NotReportActivityController@index')->name('notReport.All');
		// APi yang blom laporan
		Route::get('api/NotReportActivity/All','Admin\NotReportActivityController@apiNotDailyActivity')->name('api.not.reportActivity');
		/*===== Daily Activity  End=====*/ 

		/*===== Amaliyah Santri Start =====*/
		Route::get('amaliyah/santri/{id}', 'AllUserController@amaliyahIndex')->name('santri.amaliyah');
		/*===== Amaliyah Santri End =====*/

		/*===== Ubah Password start =====*/
		Route::get('userpass/{id}/edit', 'AllUserController@passwordEdit')->name('password.edit');
		Route::patch('userpass/{id}/edit', 'AllUserController@passwordUpdate')->name('password.update');
		/*===== Ubah Password start =====*/

		/*===== Izin Motor Start =====*/
		Route::resource('adminmotor','Admin\MotorAdminController');
		Route::get('apimotoradmin', 'Admin\MotorAdminController@apiMotor')->name('api.motor.admin');
		/*===== Izin Motor end =====*/


		/*===== Register Start =====*/
		Route::resource('register','Admin\RegisterController');
		// Route::delete('delete/{id}','Admin\RegisterController@destroy')->name('delete.delete');

		Route::get('register/all/programmer','Admin\RegisterController@index')->name('register.programmer');
		Route::get('register/all/multimedia','Admin\RegisterController@index')->name('register.multimedia');
		Route::get('register/all/imers','Admin\RegisterController@index')->name('register.imers');
		Route::get('register/all/cyber','Admin\RegisterController@index')->name('register.cyber');
		/*===== API =====*/
		/*All Register Register*/
		Route::get('api/register','Admin\RegisterController@apiRegister')->name('api.register');
		/*Divisi Programmer*/
		Route::get('api/register/programmer','Admin\RegisterController@apiRegisterProgrammer')->name('api.register.programmer');
		/*Divisi Mulimedia*/
		Route::get('api/register/multimedia','Admin\RegisterController@apiRegisterMultimedia')->name('api.register.multimedia');
		/*Divisi Imers*/
		Route::get('api/register/imers','Admin\RegisterController@apiRegisterImers')->name('api.register.imers');
		/*Divisi Cyber*/
		Route::get('api/register/cyber','Admin\RegisterController@apiRegisterCyber')->name('api.register.cyber');
		/*PDF*/
		Route::get('register/pdf/{id}','Admin\RegisterController@exportPDF')->name('register.pdf');
		/*===== Register End =====*/

		/*===== Invoice start =====*/
		Route::resource('invoice-admin','Admin\InvoiceController');
		Route::get('api/invoice-admin','Admin\InvoiceController@apiInvoice')->name('api.invoice-admin');
		/*===== Invoice end =====*/

		/*=== Confirmation Start =====*/
		Route::resource('confirmation-admin','Admin\ConfirmationController');
		Route::get('api/confirmation-admin','Admin\ConfirmationController@apiConfirmation')->name('api.confirmation-admin');
		/*=== Confirmation End =====*/
		
		/*Route Admin, route ini sudah termasuk CRUD karna ini Route::reosurce lebih jelas liat dok laravel*/
		Route::resources([
				'user' => 'AllUserController'
			]);
		Route::get('api-user/{categorie}','AllUserController@apiUser')->name('api-user');
	

	});

	/*=============================================================================================*/
	/*======================================== Admin End ==========================================*/
	/*=============================================================================================*/
});