<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)), // akan menghasilkan 6 kata secara default, dan mt_rand(2,8) akan menghasilkan 2 sampai 8 kata secara random
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(10,20)),
            // 'body' => $this->faker->paragraphs(mt_rand(10,15), true), // akan menghasilkan 10 sampai 15 paragraf secara random
            'body' => collect($this->faker->paragraphs(mt_rand(10,15)))
                    -> map(function ($p) {
                        return "<p>$p</p>";
                    }) -> implode(''), // akan menghasilkan 10 sampai 15 paragraf secara random
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,5),
        ];
    }
}
