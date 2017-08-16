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
Route::resource('cnos', 'CnoController');
Route::get('caracterizacion/{survey}', 'SurveyController@showCaracterizacion');
Route::get('/cno/{survey}/{cod_area}/{category?}/{level?}', 'CnoController@cno_report');
Route::get('/profesion/{cod_porfesion}/{level?}', 'CnoController@cno_profesion');
Route::get('/cnopdf/{survey}/{cod_area}/{category?}/{level?}', 'CnoController@cno_reportpdf');

Route::group(['middleware' => 'auth'], function () {




});

