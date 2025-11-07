<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; // Corregir el namespace

Route::get('/', function () {
    return view('welcome');
});

Route::get('fastbite', [ProductoController::class, 'index'])->name('fastbite');