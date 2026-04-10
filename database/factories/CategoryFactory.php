<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'parent_id' => null, // Default adalah kategori Utama
        ];
    }

    // State untuk memaksa kategori ini menjadi SUB (punya parent)
    public function sub()
    {
        return $this->state(function (array $attributes) {
            // Ambil ID dari Nasional atau Internasional secara acak
            $parent = Category::whereNull('parent_id')->inRandomOrder()->first();

            return [
                'parent_id' => $parent ? $parent->id : null,
            ];
        });
    }
}
