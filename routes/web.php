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


Route::middleware(['auth','verified'])->group(function () {

    Route::get('/', function () {return redirect()->route('tickets');})->name('dashboard');
    Route::get('/user/profile', 'userController@index')->name('profile');


    //tickets route
    Route::get('/tickets','ticketController@index')->name('tickets');
    Route::get('/create/ticket', 'ticketController@create')->name('create.ticket');
    Route::get('/create/Sub/ticket/{id}', 'ticketController@createSubTicket')->name('create.sub.ticket');
    Route::post('/tickets', 'ticketController@store')->name('store.ticket');
    Route::get('/ticket/{id}', 'ticketController@show')->name('show.ticket');
    Route::put('/update/ticket/{id}', 'ticketController@update')->name('update.ticket');
    Route::get('/resolve/ticket/{id}', 'ticketController@resolve')->name('resolve.ticket');
    Route::get('/edit/ticket/{id}', 'ticketController@edit')->name('edit.ticket');
    Route::get('/delete/ticket/{id}', 'ticketController@delete')->name('delete.ticket');

    //profile routes
    Route::put('/profile/{id}', 'userController@update')->name('update.profile');

    //notification routes
    Route::post('/mark-as-read', 'notificationController@markNotification')->name('markNotification');

    //theme color Routes
    Route::get('/theme/color/{color}', 'ThemeController@themeColorSkin')->name('theme.color');
});
