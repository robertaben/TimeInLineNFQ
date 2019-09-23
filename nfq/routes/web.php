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
    return view('welcome');
});


Route::match(['put', 'patch'], '/appointments/{id}/{slug}', 'AppointmentController@delay')->name('appointments.delay');
Route::get('appointments/display', 'AppointmentController@display')->name('appointments.display');
Route::resource('appointments', 'AppointmentController', ['except' => 'show']);
Route::get('/appointments/{id}/{slug}', 'AppointmentController@show')->name('appointments.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
