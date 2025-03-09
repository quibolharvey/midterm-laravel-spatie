<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Random 3-word title
            'artist' => $this->faker->name(),    // Random artist name
            'genre' => $this->faker->randomElement([
                'Rock', 'Pop', 'Jazz', 'Hip Hop', 'Classical', 'Electronic'
            ]),
            'duration' => $this->faker->numberBetween(120, 300), // Random duration between 2-5 minutes
            'release_date' => $this->faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
        ];
    }
}