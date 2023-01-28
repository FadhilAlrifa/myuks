<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospital>
 */
class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->sentence(mt_rand(2, 6)),
            "slug" => fake()->slug(),
            "location" => fake()->sentence(mt_rand(2, 6)),
            "schedule" => fake()->sentence(mt_rand(2, 6)),
            "rating" => mt_rand(1, 5),
            "link" => fake()->sentence(mt_rand(3, 7)),
            "image" => 'img',
        ];
    }
}
