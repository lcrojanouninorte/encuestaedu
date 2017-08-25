<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/surveys', "SurveyController@index");
Route::post('/surveys', "SurveyController@store");
Route::get('/questions', "QuestionController@index");

Route::get('/caracterizacion/{survey}', 'SurveyController@getResultByAreas');

Route::get('validate/{email}', 'SurveyController@validateEmail');