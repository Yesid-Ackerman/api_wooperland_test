<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,  // Genera un nombre aleatorio para el nivel
            'description_level' => $this->faker->sentence,  // Genera una descripción aleatoria
            'prize_level' => $this->faker->word,  // Genera una palabra aleatoria para el premio
            'voice_option' => $this->faker->word,  // Genera una palabra aleatoria para la opción de voz
            'level' => $this->faker->url,  // Genera una URL aleatoria para el nivel
            'help_level' => $this->faker->sentence,  // Genera una oración aleatoria para la ayuda del nivel
            'score_level' => $this->faker->numberBetween(0, 100),  // Genera un número aleatorio entre 0 y 100
            'topic_id' => Topic::factory(),  // Crea una nueva instancia de Topic y obtiene su ID
        ];
    }
}
