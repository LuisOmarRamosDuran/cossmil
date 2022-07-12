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

Route::get('inicio', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login_pos', [App\Http\Controllers\Auth\LoginController::class, 'login_web'])->name('inicio');
Route::post('/register_pos', [App\Http\Controllers\Auth\RegisterController::class, 'create_user'])->name('register_web');
