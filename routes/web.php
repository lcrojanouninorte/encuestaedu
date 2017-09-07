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
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('surveys', 'SurveyController');
Route::resource('questions', 'QuestionController');
Route::get('instrucciones', 'SurveyController@instrucciones');
	Route::resource('cnos', 'CnoController');
	Route::get('validate/{email}', 'SurveyController@validateEmail');

Route::get('caracterizacion/{survey}', 'SurveyController@showCaracterizacion');

Route::post('/register_orientate', 'SurveyController@register_orientate')->name('register_orientate');;


Route::get('/cno/{survey}/{cod_area}/{category?}/{level?}', 'CnoController@cno_report');
Route::get('/profesion/{cod_porfesion}/{level?}', 'CnoController@cno_profesion');
Route::get('/profesionpdf/{cod_porfesion}/{level?}', 'CnoController@cno_profesionpdf');
Route::get('/profesionemail/{cod_porfesion}/{level?}', 'CnoController@cno_profesionmail');
Route::get('/cnopdf/{survey}/{cod_area}/{category?}/{level?}', 'CnoController@cno_reportpdf');

Route::group(['middleware' => 'auth'], function () {




});

