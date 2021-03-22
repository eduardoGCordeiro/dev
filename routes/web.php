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

Route::get('/', ["uses" => '\App\Http\Controllers\ProfileController@index', "as" => "home"])
->middleware('can:view, App\Model\Profile'); // List all

Route::get('/form', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "create"])
->middleware('can:create,App\Model\Profile'); // FORM Add new

Route::get('/form/{item}', ["uses" => '\App\Http\Controllers\ProfileController@form', "as" => "edit"])
->middleware('can:update, App\Model\Profile'); // FORM Edit one

Route::post('/', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "save"])
->middleware('can:create, App\Model\Profile'); // Save new

Route::put('/{item}', ["uses" => '\App\Http\Controllers\ProfileController@save', "as" => "update"])
->middleware('can:update,App\Model\Profile'); // Save edit

Route::get('/delete/{item}', ["uses" => '\App\Http\Controllers\ProfileController@destroy', "as" => "delete"])
->middleware('can:delete,App\Model\Profile'); // Delete one
