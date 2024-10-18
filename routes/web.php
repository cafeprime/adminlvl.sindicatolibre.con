<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumnosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//PARA CREAR UN USUARIO DE PRUEBA
Route::get('/crear-usuario-prueba', [LoginController::class, 'createTestUser']);

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/ajaxlogin', [LoginController::class, 'ajaxlogin']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('registros-listar', [AlumnosController::class, 'listar'])->middleware('auth');

// Así nombramos rutas
// Route::get('/url1/{var}', function () {
//     return route('url.quesea');
// })->where('var', '[A-Za-z]'); //Protegemos el parametro var permitiendo sólo letras
// Route::get('/urlquesea', function(){
//     return "Esta es la ruta que sea";
// })->name('url.quesea');
