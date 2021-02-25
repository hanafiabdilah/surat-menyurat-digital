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

Route::get('/', 'AuthController@index')->name('login');
Route::post('/', 'AuthController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    //Dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //CRUD
    Route::resource('user', 'UserController');
    Route::resource('klasifikasi', 'KlasifikasiController');
    Route::resource('sifatsurat', 'SifatSuratController');
    Route::resource('transaksisurat', 'TransaksiSuratController');
    Route::get('/transaksisurat/download/{file}', 'TransaksiSuratController@downloadFile')->name('downloadFile');

    //Account
    Route::get('/account', 'AccountController@index')->name('account');
    Route::post('/account', 'AccountController@update')->name('account.update');

    //Ubah Password
    Route::get('/password', 'AccountController@password')->name('password');
    Route::post('/password', 'AccountController@updatePassword')->name('password.update');

    //Logout
    Route::get('logout', 'AuthController@logout')->name('logout');
});
