<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;

// Redirigir la raíz al login si no está autenticado
Route::get('/', function () {
    return redirect()->route('login');
})->name('fastbite');

// Rutas de autenticación
Auth::routes();

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('productos', ProductoController::class);
    Route::patch('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');
    Route::delete('/productos/{id}/force-delete', [ProductoController::class, 'forceDelete'])->name('productos.forceDelete');
    
    Route::get('/dashboard', [ProductoController::class, 'index'])->name('fastbite');
});