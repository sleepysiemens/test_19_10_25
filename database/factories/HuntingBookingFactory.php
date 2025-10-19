<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HuntingBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tour_name'          => fake()->word,
            'hunter_name'        => fake()->name,
            'guide_id'           => rand(1, 15),
            'date'               => fake()->unique()->date,
            'participants_count' => rand(1, 10),
        ];
    }
}
