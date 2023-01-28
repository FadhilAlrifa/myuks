<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" => fake()->sentence(mt_rand(2, 6)),
            "slug" => fake()->slug(),
            "view" => mt_rand(1, 10),
            "category_id" => mt_rand(1, 3),
            "highlight" => fake()->sentence(mt_rand(8, 20)),
            "body" => collect(fake()->paragraphs(mt_rand(3, 10)))->map(function ($p) {
                return "<p>$p</p>";
            })->implode(''),
            "image" => 'img'
        ];
    }
}
