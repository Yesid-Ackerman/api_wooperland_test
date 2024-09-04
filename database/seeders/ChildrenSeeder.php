<?php

namespace Database\Seeders;

use App\Models\Children;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 registros aleatorios en la tabla `children`
        Children::factory(10)->create();
    }
}
