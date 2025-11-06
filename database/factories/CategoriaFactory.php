<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorias = [
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
        'Promociones'
];
        return [
            //
            'nombre' => $this->faker->randomElement($categorias),
        ];
    }
}
