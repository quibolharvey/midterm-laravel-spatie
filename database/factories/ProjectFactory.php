<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Random project name, e.g., "Website Redesign"
            'description' => $this->faker->paragraph(), // Random description
            'start_date' => $this->faker->dateTimeThisYear(), // Random start date within this year
            'status' => $this->faker->randomElement(['Active', 'Completed', 'On Hold', 'Cancelled']),
        ];
    }
}
