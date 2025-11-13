<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // Corregir el namespace

Route::get('/', [ProductoController::class, 'index'])->name('fastbite');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');