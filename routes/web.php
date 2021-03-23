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

/*  DEFAULT ROUTE */

Route::get('/', function () {
    return view('welcome');
});

/* PROFILE ROUTES */
Route::group([
    'as'     => 'profile.',
    'prefix' => 'profile'
], function () {
    Route::get('/', ["uses" => '\App\Http\Controllers\ProfileController@index', "as" => "home"]);
    Route::get('/form', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "create"]);
    Route::get('/form/{item}', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "edit"]);
    Route::post('/{item}', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "update"]);
    Route::post('/', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "save"]);
    Route::get('/delete/{item}', ["uses" => '\App\Http\Controllers\ProfileController@destroy', "as" => "delete"]);
});

/* EDUCATION LEVEL ROUTES */

Route::group([
    'as'     => 'education_level.',
    'prefix' => 'education_level'
], function () {
    Route::get('/', ["uses" => '\App\Http\Controllers\ProfileController@index', "as" => "home"]);
    Route::get('/form', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "create"]);
    Route::get('/form/{item}', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "edit"]);
    Route::post('/{item}', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "update"]);
    Route::post('/', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "save"]);
    Route::get('/delete/{item}', ["uses" => '\App\Http\Controllers\ProfileController@destroy', "as" => "delete"]);
});
