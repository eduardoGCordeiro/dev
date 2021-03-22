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
    Route::get('/profile', ["uses" => '\App\Http\Controllers\ProfileController@index', "as" => "home"]);
    Route::get('/profile/form', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "create"]);
    Route::get('/profile/form/{item}', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "edit"]);
    Route::post('/profile', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "save"]);
    Route::put('/profile/{item}', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "update"]);
    Route::get('/profile/delete/{item}', ["uses" => '\App\Http\Controllers\ProfileController@destroy', "as" => "delete"]);
});

/* EDUCATION LEVEL ROUTES */

Route::group([
    'as'     => 'education_level.',
    'prefix' => 'education_level'
], function () {
    Route::get('/education_level', ["uses" => '\App\Http\Controllers\EducationLevelController@index', "as" => "home"]);
    Route::get('/education_level/form', ["uses" => '\App\Http\Controllers\EducationLevelController@form', "as" => "create"]);
    Route::get('/education_level/form/{item}', ["uses" => '\App\Http\Controllers\EducationLevelController@form', "as" => "edit"]);
    Route::post('/education_level', ["uses" => '\App\Http\Controllers\EducationLevelController@save', "as" => "save"]);
    Route::put('/education_level/{item}', ["uses" => '\App\Http\Controllers\EducationLevelController@save', "as" => "update"]);
    Route::get('/education_level/delete/{item}', ["uses" => '\App\Http\Controllers\EducationLevelController@destroy', "as" => "delete"]);
});
