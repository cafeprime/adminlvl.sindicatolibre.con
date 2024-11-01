<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistrosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/crear-usuario-prueba', [LoginController::class, 'createTestUser']);

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('ajaxlogin', [LoginController::class, 'ajaxlogin']);
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('registros-listar', [RegistrosController::class, 'index'])->name('registros.listar')->middleware('auth');

// Superadmin
Route::middleware(['auth', 'role:Superadmin'])->group(function () {
    Route::get('registros-crear', [RegistrosController::class, 'crear'])->name('registros.crear');
    Route::get('registros-modificar/{reg}', [RegistrosController::class, 'modificar'])->name('registros.modificar');
    Route::get('registros-listar-modificados', [RegistrosController::class, 'listarModificados'])->name('registros.listar.modificados');
    Route::get('registros-listar-eliminados', [RegistrosController::class, 'listarEliminados'])->name('registros.listar.eliminados');
    Route::get('administradores-listar', [RegistrosController::class, 'index'])->name('administradores.listar');
    Route::get('administradores-crear', [RegistrosController::class, 'crear'])->name('administradores.crear');
    Route::get('administradores-modificar/{reg}', [RegistrosController::class, 'modificar'])->name('administradores.modificar');
    Route::get('opciones', [RegistrosController::class, 'index'])->name('opciones');
});

// Administrador
Route::middleware(['auth', 'role:Administrador'])->group(function () {    
    Route::get('registros-crear', [RegistrosController::class, 'crear'])->name('registros.crear');
    Route::get('registros-modificar/{reg}', [RegistrosController::class, 'modificar'])->name('registros.modificar');
    Route::get('registros-listar-modificados', [RegistrosController::class, 'listarModificados'])->name('registros.listar.modificados');
});

// Admincursos
Route::middleware(['auth', 'role:Admincursos'])->group(function () {
    Route::get('registros-listar-modificados', [RegistrosController::class, 'listarModificados'])->name('registros.listar.modificados');
    Route::get('registros-listar-eliminados', [RegistrosController::class, 'listarEliminados'])->name('registros.listar.eliminados');
});

// Adminplan2
Route::middleware(['auth', 'role:Adminplan2'])->group(function () {    
    Route::get('registros-listar-modificados', [RegistrosController::class, 'listarModificados'])->name('registros.listar.modificados');
    Route::get('registros-listar-eliminados', [RegistrosController::class, 'listarEliminados'])->name('registros.listar.eliminados');
});

// Así nombramos rutas
// Route::get('/url1/{var}', function () {
//     return route('url.quesea');
// })->where('var', '[A-Za-z]'); //Protegemos el parametro var permitiendo sólo letras
// Route::get('/urlquesea', function(){
//     return "Esta es la ruta que sea";
// })->name('url.quesea');
