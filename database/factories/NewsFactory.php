<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'author' => fake()->name(),
            'image' => 'https://picsum.photos/640/480', // Gambar dummy
            'category' => fake()->randomElement(['Nasional', 'International']),
            'sub_category' => fake()->randomElement(['Tech', 'Sports', 'Health', 'Politics']),
        ];
    }
}
