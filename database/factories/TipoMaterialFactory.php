<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoMaterialFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => fake()->name(),
            'observacao' => fake()->text(),
        ];
    }
}
