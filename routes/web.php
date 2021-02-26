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

    //Account
    Route::get('/account', 'AccountController@index')->name('account');
    Route::post('/account', 'AccountController@update')->name('account.update');

    //Ubah Password
    Route::get('/password', 'AccountController@password')->name('password');
    Route::post('/password', 'AccountController@updatePassword')->name('password.update');

    Route::group(['middleware' => ['role:staff']], function () {
        Route::resource('transaksisurat', 'TransaksiSuratController');
        Route::resource('transaksisurat/{id_surat}/disposisi', 'DisposisiController');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        //CRUD
        Route::resource('user', 'UserController');
        Route::resource('klasifikasi', 'KlasifikasiController');
        Route::resource('sifatsurat', 'SifatSuratController');
    });


    Route::get('transaksisurat/f/filter', 'TransaksiSuratController@filter')->name('filter');
    Route::resource('transaksisurat', 'TransaksiSuratController')->only('index', 'show');
    Route::resource('transaksisurat/{id_surat}/disposisi', 'DisposisiController')->only('index', 'edit');
    Route::resource('klasifikasi', 'KlasifikasiController')->only('index');
    Route::get('transaksisurat/download/{file}', 'TransaksiSuratController@downloadFile')->name('downloadFile');

    //Logout
    Route::get('logout', 'AuthController@logout')->name('logout');
});
