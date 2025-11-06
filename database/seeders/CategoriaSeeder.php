<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\Categoria::factory()->count(10)->create();
        $categorias = ['Bebidas', 
        'Hamburguesas',
        'Papas Fritas',
        'Hot Dogs',
        'Pizzas',
        'Alitas de Pollo',
        'Sandwiches',
        'Tacos',
        'Bebidas',
        'Postres',
        'Combos',
        'Promociones'];
        foreach ($categorias as $nombre) {
            \App\Models\Categoria::create(['nombre' => $nombre]);
        }
    }
}
