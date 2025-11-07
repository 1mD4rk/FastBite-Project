<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // ✅ AGREGADO
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use SoftDeletes;

    public $table = 'productos';
    
    public $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'categoria', 
        'imagen'
    ];

    public function categoriaRelacion(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }
}