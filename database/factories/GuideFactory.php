<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'             => fake()->name,
            'experience_years' => rand(0, 20),
            'is_active'        => (bool) rand(0, 1),
        ];
    }
}
