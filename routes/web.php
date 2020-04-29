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

    Route::get('/tasks','TaskController@index');

    Route::post('/tasks/task/{id}','TaskController@show');

Route::post('/tasks/storeToTaskController','TaskController@store')->name('store');
//Route::delete('delete/{id}','TaskController@destroy');
Route::post('/tasks/edit/{id}','TaskController@update');
 Route::resource('/tasks/index', 'TaskController');
Route::delete('/tasks/index/delete/{id}','TaskController@destroy');

///Route::put('/tasks/edit/{id}','TaskController@edit');
//Route::patch('/tasks/update/{id}','TaskController@update');





\Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
