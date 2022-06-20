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


    Route::get('/', 'ClientController@index')->name('client.index');


    Route::get('/create', 'ClientController@create')->name('client.create');

    Route::post('/store', 'ClientController@store')->name('client.store');

    Route::get('/edit/{id}', 'ClientController@edit')->name('client.edit');
    
    Route::post('/update/{id}', 'ClientController@update')->name('client.update');

    Route::get('/delete/{id}', 'ClientController@delete')->name('client.delete');

