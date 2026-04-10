<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(5, true),
            'author' => fake()->name(),
            'image' => 'https://picsum.photos/seed/'.fake()->word().'/640/480',

            // HANYA ambil ID yang punya parent_id (Artinya ini adalah Sub-Kategori)
            'category_id' => Category::whereNotNull('parent_id')->inRandomOrder()->first()->id,

            'published_at' => fake()->optional(0.8)->dateTimeBetween('-20 year', 'now'),
        ];
    }
}
