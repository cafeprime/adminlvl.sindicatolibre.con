<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistrosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//PARA CREAR UN USUARIO DE PRUEBA
Route::get('/crear-usuario-prueba', [LoginController::class, 'createTestUser']);

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('ajaxlogin', [LoginController::class, 'ajaxlogin']);
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('cambiar-password', [PasswordController::class, 'formulario'])->middleware('auth');

Route::get('registros-listar', [RegistrosController::class, 'index'])->name('registros.listar')->middleware('auth');
Route::get('registros-crear', [RegistrosController::class, 'crear'])->name('registros.crear')->middleware('auth');
Route::get('registros-modificar/{reg}', [RegistrosController::class, 'modificar'])->name('registros.modificar')->middleware('auth');

Route::get('registros-listar-modificados', [RegistrosController::class, 'index'])->name('registros.modificados')->middleware('auth');
Route::get('registros-listar-eliminados', [RegistrosController::class, 'index'])->name('registros.eliminados')->middleware('auth');

Route::get('administradores-listar', [RegistrosController::class, 'index'])->name('administradores.listar')->middleware('auth');
Route::get('administradores-crear', [RegistrosController::class, 'crear'])->name('administradores.crear')->middleware('auth');
Route::get('administradores-modificar/{reg}', [RegistrosController::class, 'modificar'])->name('administradores.modificar')->middleware('auth');

Route::get('opciones', [RegistrosController::class, 'index'])->name('opciones')->middleware('auth');

// Así nombramos rutas
// Route::get('/url1/{var}', function () {
//     return route('url.quesea');
// })->where('var', '[A-Za-z]'); //Protegemos el parametro var permitiendo sólo letras
// Route::get('/urlquesea', function(){
//     return "Esta es la ruta que sea";
// })->name('url.quesea');
