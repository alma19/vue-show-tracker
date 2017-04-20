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
    return view('app');
});

Route::get('/styleguide', function () {
    return view('styleguide');
});

//api routes

Route::get('/shows', 'ShowController@index');
Route::post('/shows', 'ShowController@create');
Route::get('/shows/{id}', 'ShowController@show');
Route::put('/shows/{id}', 'ShowController@update');
Route::delete('/shows/{id}', 'ShowController@destroy');
