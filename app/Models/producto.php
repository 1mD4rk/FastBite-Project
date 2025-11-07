<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model // Cambiar a PascalCase
{
    public $table = 'productos';
    
    public $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'categoria', 
        'imagen'
    ];

    /**
     * Relación con la categoría
     */
    public function categoriaRelacion(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }
}