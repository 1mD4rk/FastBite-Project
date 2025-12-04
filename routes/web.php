<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;

// Redirigir la raíz: al login si no está autenticado, al dashboard si está autenticado
Route::get('/', function () {
    return auth()->check() ? redirect()->route('fastbite') : view('auth.login');
})->name('login.page');

// Rutas de autenticación
Auth::routes();

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Dashboard principal (fastbite)
    Route::get('/dashboard', [ProductoController::class, 'index'])->name('fastbite');
    
    // Home (puede redirigir al dashboard si quieres)
    Route::get('/home', function () {
        return redirect()->route('fastbite');
    })->name('home');
    
    // Rutas de productos
    Route::resource('productos', ProductoController::class);
    Route::patch('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');
    Route::delete('/productos/{id}/force-delete', [ProductoController::class, 'forceDelete'])->name('productos.forceDelete');
});