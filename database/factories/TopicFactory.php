<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->word,  // Genera un nombre aleatorio para el tema
            'Descripcion' => $this->faker->sentence,  // Genera una descripción aleatoria
            'Dificultad' => $this->faker->randomElement(['Fácil', 'Intermedio', 'Difícil']),  // Genera una dificultad aleatoria
        ];
    }
}
