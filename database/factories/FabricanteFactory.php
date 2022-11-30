<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FabricanteFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => fake()->company(),
            'observacao' => fake()->text(),
        ];
    }
}
