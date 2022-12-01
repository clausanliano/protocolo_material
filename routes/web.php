<?php

use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ReciboController;
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
Route::resource('recibo', ReciboController::class);
//Route::resource('item', ItemController::class);

Route::get('item/{recibo}/create', [ItemController::class, 'create'])->name('item.create');

Route::post('item/{recibo}', [ItemController::class, 'store'])->name('item.store');
Route::put('item/{item}', [ItemController::class, 'update'])->name('item.update');
Route::delete('item/{item}', [ItemController::class, 'destroy'])->name('item.destroy');

Route::get('item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
