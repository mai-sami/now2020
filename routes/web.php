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

Route::post('/tasks/store','TaskController@store');
//Route::delete('delete/{id}','TaskController@destroy');
Route::post('/tasks/edit/{id}','TaskController@update');
 Route::resource('/tasks/index', 'TaskController');
Route::delete('/tasks/index/delete/{id}','TaskController@destroy');







 // $tasks=['task1','task2','task3'];
 // $tasks = DB::table('webs')->get();
  // return $tasks;
// return view('welcome',compact('tasks'));
//});
