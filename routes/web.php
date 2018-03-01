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

Route::get('/', 'SessionsController@create')->name('home');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/my_tickets', 'TicketsController@userTickets');
Route::post('/my_tickets', 'TicketsController@store');

Route::group(['middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketsController@index');
    Route::get('tickets/{id}', 'TicketsController@show');
    Route::post('tickets/{id}/close', 'TicketsController@close');
    Route::post('tickets/{id}/open', 'TicketsController@open');
    Route::post('tickets/{id}/comment', 'TicketsController@comment');
});

