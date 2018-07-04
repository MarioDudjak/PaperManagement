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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{id}/edit', 'UserController@edit');

Route::post('/user/update', 'UserController@updateUser');

Route::get('/task/{lang}/create','TaskController@createForm');

Route::post('task/create','TaskController@createTask');

Route::get('/task/{id}/apply', 'TaskController@apply');

Route::get('/task/{id}/withdraw', 'TaskController@withdraw');

Route::get('/task/{id}/student', 'TaskController@chooseStudent');

Route::get('/task/{task_id}/student/{student_id}/confirm', 'TaskController@confirmStudent');



