<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'in-progress', 'completed', 'blocked']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'estimate' => $this->faker->randomDigitNotZero(),
            'reminder' => $this->faker->dateTimeBetween('now', '+1 week'),
            'due_date' => $this->faker->dateTimeBetween('+2 week', '+1 month'),
        ];
    }
}
