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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', 'PostController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/checkMobile', 'Auth\LoginController@checkMobile')->name('check.mobile');
Route::get('/insertMobile', 'Auth\LoginController@showLoginForm');
Route::post('/verifyMobile', 'Auth\LoginController@verifyMobile')->name('verify.mobile');
Route::get('/verifyMobile', 'Auth\LoginController@showVerifyForm');
