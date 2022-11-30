<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoMaterialSeeder extends Seeder
{
    public function run()
    {
        \App\Models\TipoMaterial::factory(10)->create();
    }
}
