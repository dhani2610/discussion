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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'BerandaController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slug}', 'BerandaController@detail')->name('detail.materi');
Route::get('jawab/{slug}/{id}', 'BerandaController@jawab')->name('jawab');
Route::post('store-jawaban', 'BerandaController@store')->name('store-jawaban');


Route::get('/admin/register', 'BerandaController@register')->name('admin-register');
Route::post('/admin/register/store', 'BerandaController@registerStore')->name('admin-register-store');

/**
 * Admin routes
 */
Route::get('admin/transaksi/invoice/{id}', 'Backend\TransaksiController@invoice')->name('transaksi.invoice');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);


    Route::group(['prefix' => 'materi'], function () {
        Route::get('/', 'Backend\MateriController@index')->name('materi');
        Route::get('create', 'Backend\MateriController@create')->name('materi.create');
        Route::post('store', 'Backend\MateriController@store')->name('materi.store');
        Route::get('edit/{id}', 'Backend\MateriController@edit')->name('materi.edit');
        Route::post('update/{id}', 'Backend\MateriController@update')->name('materi.update');
        Route::get('destroy/{id}', 'Backend\MateriController@destroy')->name('materi.destroy');
    });

    Route::group(['prefix' => 'pertanyaan'], function () {
        Route::get('/{id}', 'Backend\PertanyaanController@index')->name('pertanyaan');
        Route::get('create/{id}', 'Backend\PertanyaanController@create')->name('pertanyaan.create');
        Route::post('store/{id}', 'Backend\PertanyaanController@store')->name('pertanyaan.store');
        Route::get('edit/{id}/{id_materi}', 'Backend\PertanyaanController@edit')->name('pertanyaan.edit');
        Route::post('update/{id}/{id_materi}', 'Backend\PertanyaanController@update')->name('pertanyaan.update');
        Route::get('destroy/{id}/{id_materi}', 'Backend\PertanyaanController@destroy')->name('pertanyaan.destroy');
    });
    
    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
