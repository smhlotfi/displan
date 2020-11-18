<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;
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
    return view('home');
});



Route::prefix('task')->group(function (){
    Route::get('create/{userId}' , 'App\Http\Controllers\TaskController@new');
    Route::post('create' , 'App\Http\Controllers\TaskController@save');
    Route::post('delete' , 'App\Http\Controllers\TaskController@delete');
    Route::get('edit/{id}' , 'App\Http\Controllers\TaskController@edit');
    Route::post('edit' , 'App\Http\Controllers\TaskController@update');
    Route::get('done/{id}' , 'App\Http\Controllers\TaskController@done');
});

Route::prefix('goal')->group(function (){
    Route::get('create/{userId}' , 'App\Http\Controllers\GoalController@new');
    Route::post('create' , 'App\Http\Controllers\GoalController@save');
    Route::post('delete' , 'App\Http\Controllers\GoalController@delete');
    Route::get('edit/{id}' , 'App\Http\Controllers\GoalController@edit');
    Route::post('edit' , 'App\Http\Controllers\GoalController@update');
    Route::get('done/{id}' , 'App\Http\Controllers\GoalController@done');
});

Route::prefix('user')->group(function (){
    Route::get('create' , 'App\Http\Controllers\UserController@new');
    Route::post('create' , 'App\Http\Controllers\UserController@save');
    Route::delete('delete' , 'App\Http\Controllers\UserController@delete');
    Route::put('edit' , 'App\Http\Controllers\UserController@edit');
    Route::get('login' , 'App\Http\Controllers\UserController@loginView');
    Route::post('login' , 'App\Http\Controllers\UserController@loginAction');
    Route::get('{id}' , 'App\Http\Controllers\UserController@home')->name('user');
});


