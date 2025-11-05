<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //
    public $table = 'productos';
    public $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'categoria', 
        'imagen'
    ];
}
