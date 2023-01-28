<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
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
            "view" => mt_rand(1, 10),
            "category_id" => mt_rand(1, 4),
            "stock" => mt_rand(1, 20),
            "dose" => fake()->sentence(mt_rand(3, 7)),
            "composition" => fake()->sentence(mt_rand(3, 7)),
            "body" => collect(fake()->paragraphs(mt_rand(3, 10)))->map(function ($p) {
                return "<p>$p</p>";
            })->implode(''),
            "side_effect" => fake()->sentence(mt_rand(4, 8)),
            "image" => 'img'
        ];
    }
}
