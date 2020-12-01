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

Auth::routes();
Route::post('/search', 'TaskController@search');

Route::resource('/task', 'TaskController', ['only' => ['index', 'create', 'edit', 'show', 'update', 'destroy', 'store']])->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
