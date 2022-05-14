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

// Route::get('/', function () {
//     return view('layout.app');
// })->middleware('auth')->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/edit/ticket/{id}', 'ticketController@edit')->name('edit.ticket');
    Route::get('/', function () {return view('layout.app');})->name('dashboard');
    Route::get('/user/profile', function () {return view('profile.profile');})->name('profile');
    Route::get('/Projects', function () {return view('project.projects');})->name('Projects');

    //tickets route
    Route::get('/tickets','ticketController@index')->name('tickets');
    Route::get('/create/ticket', 'ticketController@create')->name('create.ticket');
    Route::post('/tickets', 'ticketController@store')->name('store.ticket');
    Route::get('/ticket/{id}', 'ticketController@show')->name('show.ticket');
    Route::put('/update/ticket/{id}', 'ticketController@update')->name('update.ticket');
    Route::get('/edit/ticket/{id}', 'ticketController@edit')->name('edit.ticket');
    Route::get('/delete/ticket/{id}', 'ticketController@delete')->name('delete.ticket');

    //tickets route

    Route::put('/profile/{id}', 'userController@update')->name('update.profile');

});
