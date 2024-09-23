<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login']);

// Así nombramos rutas
// Route::get('/url1/{var}', function () {
//     return route('url.quesea');
// })->where('var', '[A-Za-z]'); //Protegemos el parametro var permitiendo sólo letras
// Route::get('/urlquesea', function(){
//     return "Esta es la ruta que sea";
// })->name('url.quesea');
