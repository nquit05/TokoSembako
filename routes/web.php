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

Route::get('/', 'DashboardController@index')->name('index');


Route::prefix('/jenis')->group(function () {
    Route::get('/', 'JenisController@index')->name('index');
    Route::get('/add', 'JenisController@add')->name('add');
    Route::post('/store', 'JenisController@store')->name('store');
    Route::get('/delete/{id}', 'JenisController@delete')->name('delete');
    Route::get('/edit/{id}', 'JenisController@edit')->name('edit');
});

Route::prefix('/barang')->group(function () {
    Route::get('/', 'BarangController@index')->name('index');
    // Route::get('/delete/{id}', 'BarangController@delete')->name('delete');
});
