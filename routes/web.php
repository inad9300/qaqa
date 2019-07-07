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

Route::get('/', 'HomeController@listQuestions');
Route::post('/', 'HomeController@saveQuestion');

Route::get('/question/{id}', 'QuestionController@displayQuestion');
Route::post('/question/{id}', 'QuestionController@saveAnswer');
