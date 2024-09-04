<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grhapic' => $this->faker->word,
            'score-level' => $this->faker->randomFloat(2, 0, 100), // Genera un puntaje aleatorio entre 0 y 100
            'level-more-use' => $this->faker->word,
            'level_id' => Level::factory(), 
            'user_id' => User::factory(),  // Crea una nueva instancia de User y obtiene su ID
        ];
    }
}
