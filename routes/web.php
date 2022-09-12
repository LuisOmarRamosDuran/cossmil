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

Route::get('/enviarEmail', [App\Http\Controllers\PacienteController::class, 'enviarEmail'])->name('enviarEmail');

Route::get('/cambiar-contrasena', [App\Http\Controllers\RegisterTempController::class, 'viewChangePassword'])->name('cambiar-contrasenaView');
Route::post('/cambiar-contrasena-update', [App\Http\Controllers\RegisterTempController::class, 'updatePassword'])->name('cambiar-contrasenaPost');

Route::get('/view-remember-password', function () {
    return view('adminlte.auth.index-password-change');
})->name('view-remember-password');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/prueba', [App\Http\Controllers\PrintController::class, 'pruebaPrint'])->name('prueba');
Route::post('/login_pos', [App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('inicio');
Route::post('/register_pos', [App\Http\Controllers\Auth\RegisterController::class, 'create_user'])->name('register_web');

/*REGISTAR ADMINISTRADORES*/
Route::get('/register_temp',        [App\Http\Controllers\RegisterTempController::class, 'index'])->name('register_temp');
Route::post('/register_temp_pos',   [App\Http\Controllers\RegisterTempController::class, 'save_admin'])->name('registerTemp');
/*FIN*/

//127.0.0.1:8000/Paciente
Route::group(['middleware' => 'paciente'], function () {
    Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente');
    Route::get('/historia_clinica/{evolucion}', [App\Http\Controllers\PacienteController::class, 'historia'])->name('index.historia');//
    Route::get('/prnpriview/{evolucion}', [App\Http\Controllers\PrintController::class, 'prnpriview'])->name('prnpriview');

//   Route::get('/Paciente/{id}', [PacienteController::class, 'mostrarpaciente'])->name('paciente');
});
Route::group(['middleware' => 'medico'], function () {
    Route::get('/buscar_paciente', [\App\Http\Controllers\MedicoController::class, 'index'])->name('buscar_paciente');
    Route::post('/buscar_paciente/envio', [\App\Http\Controllers\MedicoController::class, 'buscar_paciente'])->name('buscar_paciente.envio');
    Route::get('/add_historia_clinica', [\App\Http\Controllers\MedicoController::class, 'add_historia_clinica'])->name('add_historia_clinica');
    Route::post('add_registro', [\App\Http\Controllers\MedicoController::class, 'add_registro'])->name('add_registro');
    Route::post('borrar_registro', [\App\Http\Controllers\MedicoController::class, 'delete_evolucion'])->name('delete.historia');
});

