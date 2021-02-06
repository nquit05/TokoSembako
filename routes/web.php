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

Route::redirect('/', '/login');

Route::get('/login', 'Auth\AuthController@index')->name('index');
Route::post('/auth', 'Auth\AuthController@auth')->name('auth');


Route::group(['middleware' => 'AuthLogin'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('index');

    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
    Route::prefix('/jenis')->group(function () {
        Route::get('/', 'JenisController@index')->name('index');
        Route::get('/add', 'JenisController@add')->name('add');
        Route::post('/store', 'JenisController@store')->name('store');
        Route::get('/delete/{id}', 'JenisController@delete')->name('delete');
        Route::get('/edit/{id}', 'JenisController@edit')->name('edit');
        Route::put('/update/{id}', 'JenisController@update')->name('update');
    });

    Route::prefix('/barang')->group(function () {
        Route::get('/', 'BarangController@index')->name('index');
        Route::get('/delete/{id}', 'BarangController@delete')->name('delete');
        Route::get('/add', 'BarangController@add')->name('add');
        Route::post('/store', 'BarangController@store')->name('store');
        Route::get('/edit/{id}', 'BarangController@edit')->name('edit');
        Route::put('/update/{id}', 'BarangController@update')->name('update');
    });

    Route::prefix('/pelanggan')->group(function () {
        Route::get('/', 'PelangganController@index')->name('index');
        Route::get('/add', 'PelangganController@add')->name('add');
        Route::post('/store', 'PelangganController@store')->name('store');
        Route::get('/delete/{id}', 'PelangganController@delete')->name('delete');
        Route::get('/edit/{id}', 'PelangganController@edit')->name('edit');
        Route::put('/update/{id}', 'PelangganController@update')->name('update');
    });

    Route::prefix('/transaksi')->group(function () {
        Route::get('/', 'TransaksiController@index')->name('index');
    });
});
