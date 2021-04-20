<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'todoController@index')->name('index');

Route::post('/', 'todoController@add_todo');

Route::get('/delete/{id}', 'todoController@delete_todo');

Route::get('/return/{id}', 'todoController@return_todo');

Route::get('/done/{id}', 'todoController@done_todo');

Route::get('/edit/{id}', 'todoController@edit_todo_show')->name('edit');
