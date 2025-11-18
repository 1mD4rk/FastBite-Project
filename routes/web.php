<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', [ProductoController::class, 'index'])->name('fastbite');
Route::resource('productos', ProductoController::class);
Route::patch('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');
Route::delete('/productos/{id}/force-delete', [ProductoController::class, 'forceDelete'])->name('productos.forceDelete');