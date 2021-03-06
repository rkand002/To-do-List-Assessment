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

Route::get('/', 'TasksController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/tasks','TasksController@saveTask');

Route::patch('/tasks/{task}','TasksController@updateTask');

Route::delete('/tasks/{task}', 'TasksController@deleteTask');


