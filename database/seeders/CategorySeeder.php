<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parents = ['Nasional', 'Internasional'];

        foreach ($parents as $p) {
            \App\Models\Category::create([
                'name' => $p,
                'slug' => \Illuminate\Support\Str::slug($p),
                'parent_id' => null
            ]);
        }

        \App\Models\Category::factory(15)->sub()->create();
    }
}
