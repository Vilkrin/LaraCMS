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
    public function definition(): array
    {
        return [
            'user_id' => fake('App\User'),
            'title' => fake()->sentence(),
            'post_image' => fake()->imageUrl($width = 900, $height = 400),
            'body' => fake()->paragraph(),

        ];
    }
}
