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
Route::group(['middleware' =>'guest'], function()
{
	Route::any('/', [
	'uses' => 'LoginController@home',
	'as' => 'login'
]);

Route::view('/register','register');

Route::post('/loginnow', "LoginController@loginnow");

Route::view('/login', "login");

  
});

Route::get('/logout', "LoginController@logout");

Route::group(['middleware' =>'auth'], function()
{
	 Route::get('/profile', [
      	'uses'=>'LoginController@getProfile',
      	'as'=> 'user.dashboard'
    ]);

	 Route::get('showUsers/{id}', [
      	'uses'=>'ViewController@getUsers',
      	'as'=> 'showUsers'
    ]);

	  Route::get('showDeps/{id}', [
      	'uses'=>'ViewController@getDeps',
      	'as'=> 'showDeps'
    ]);

    Route::get('/showCalendar', [
      	'uses'=>'CalendarController@showCalen',
      	'as'=> 'showCalendar'
    ]);

	 Route::get('/getEvent', ['as'=>'getEvent',
    'uses'=>'CalendarController@get_Events'

	]); 

	 Route::any('/chooseuser', "UserController@chooseuser_role");

	 Route::any('/createuserrole', "UserController@createuserrole");

	 Route::get('/create_user/{id}', "UserController@create_user");

	 Route::any('/create_dep', "UserController@postcreate_dep");

	 Route::any('/create_depnow', "UserController@create_depnow");

	 Route::post('/register_role', "RegisterController@register_role");

	 Route::post('/register_dep', "RegisterController@register_dep");

	 Route::post('/registernow', "RegisterController@registernow");

	 Route::post('/deletenow', "UserController@deletenow");

	 Route::post('/updatenow', "UserController@updatenow");

	 Route::post('/deleteuser', "UserController@deleteuser");

	 Route::get('/showdep_users/{did}/{rid}', "ViewController@showdepuser");

	 Route::any('/addpatient', "PatientController@addpatient");

	 Route::post('/refer', "PatientController@refer");

	 Route::any('/create_event', "CalendarController@create_event");

	 Route::any('/add_event', "CalendarController@add_event");

	 Route::get('/view_event/{id}', "CalendarController@viewevent");

	 Route::any('/showpatients', "PatientController@showpatient");

	 Route::get('/viewpatient/{id}', "PatientController@viewpatient");

	 Route::get('/viewpatients/{id}/{pid}/{tid}', "PatientController@viewpatients");

	 Route::get('/viewpatientz/{id}/{nid}', "PatientController@viewpatientz");

	 Route::any('/patient_dep', "PatientController@patientdep");

	 Route::get('/choosef/{id}', "PatientController@chooseform");

	 Route::get('/intakeform/{id}', "PatientController@intakeform");

	 Route::get('/ddeform/{id}', "PatientController@ddeform");

	 Route::post('/patientsave_intake', "PatientController@save_intake");

	 Route::post('/patientsave_dde', "PatientController@save_dde");

	 Route::post('/deletepatient', "PatientController@flagdelete");

	 Route::get('/markAsRead', "NotificationsController@markAsRead");

	 Route::post('/patientTransfer', "PatientController@transferPatient");

	 Route::get('/transfer_patient_now/{id}/{did}/{tid}/{pid}',"PatientController@patientTransfer");

	 Route::any('/showemployees',"ViewController@showemployees");

	 Route::any('/newemployee',"RegisterController@newemployee");

	 Route::post('/create_employee',"RegisterController@create_employee");

	 Route::post('/update_employeenow',"EmployeeController@update_employeenow");

	 Route::post('/delete_employee', "EmployeeController@delete_employeenow");

	 Route::any('/logs', "ViewController@showlogs");
});