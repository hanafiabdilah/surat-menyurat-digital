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
        Route::resource('user', 'UserController');
        Route::resource('klasifikasi', 'KlasifikasiController');
        Route::resource('sifatsurat', 'SifatSuratController');
        Route::get('logdownload', 'LogDownloadController@index')->name('logDownload.index');
        Route::delete('logdownload/{id}', 'LogDownloadController@destroy')->name('logDownload.destroy');
    });

    Route::get('transaksisurat/f/filter', 'TransaksiSuratController@filter')->name('filter');
    Route::get('user/f/filter', 'userController@filter')->name('filter_user');
    Route::get('sifatsurat/f/filter', 'SifatSuratController@filter')->name('filter_surat');

    Route::resource('transaksisurat', 'TransaksiSuratController')->only('index', 'show');
    Route::resource('transaksisurat/{id_surat}/disposisi', 'DisposisiController')->only('index', 'edit');
    Route::resource('klasifikasi', 'KlasifikasiController')->only('index');
    Route::resource('sifatsurat', 'SifatSuratController')->only('index');

    Route::get('transaksisurat/download/{file}', 'TransaksiSuratController@downloadFile')->name('downloadFile');
    Route::get('transaksisurat/f/filter', 'TransaksiSuratController@filter')->name('filter');
    Route::get('transaksisurat/d/download', 'TransaksiSuratController@download')->name('download');


    //Logout
    Route::get('logout', 'AuthController@logout')->name('logout');
});
