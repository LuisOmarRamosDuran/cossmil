<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

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
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login_pos', [App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('inicio');
Route::post('/register_pos', [App\Http\Controllers\Auth\RegisterController::class, 'create_user'])->name('register_web');

//127.0.0.1:8000/Paciente
Route::middleware(['paciente'])->group(function () {
   Route::get('/Paciente', [PacienteController::class, 'index'])->name('paciente'); 
//   Route::get('/Paciente/{id}', [PacienteController::class, 'mostrarpaciente'])->name('paciente'); 
});

