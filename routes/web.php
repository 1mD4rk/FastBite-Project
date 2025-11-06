<?php

use Illuminate\Support\Facades\Route;
use App\Models\Producto;


Route::get('/', function () {
    return view('welcome');
});

Route::view('fastbite', 'fastbite');

Route::get('prueba', function() {
    return App\Models\Producto::all();
});