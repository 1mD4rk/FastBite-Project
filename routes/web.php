<?php

use Illuminate\Support\Facades\Route;
use App\Models\Producto;


Route::get('/', function () {
    return view('welcome');
});

Route::get('fastbite', [\App\Http\Controllers\CategoriaController::class, 'index']);

