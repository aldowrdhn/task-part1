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
//     return view('index');
// });
// Route::resource('karyawan', 'KaryawanController')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => '/admin'], function () {
        Route::resource('karyawan', 'KaryawanController');
        Route::resource('jabatan', 'JabatanController');
        Route::resource('pendidikan', 'PendidikanController');
        Route::resource('status', 'StatusController');
    });
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
