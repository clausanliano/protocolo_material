<?php

use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\TipoMaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('fabricante', FabricanteController::class);
Route::resource('tipo_material', TipoMaterialController::class);
Route::resource('modelo', ModeloController::class);
Route::resource('material', MaterialController::class);
