<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Luthfi Ferdinan Muslih',
            'email' => 'luthfiferd@gmail.com',
            'role' => 'admin',
            'password' => '123456',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'M Malwan Angkasa',
            'email' => 'malwanangkasa@gmail.com',
            'role' => 'admin',
            'password' => '123456',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mohammad Hiqmal Ariffansyah',
            'email' => 'arrifansyahmhiqmal@gmail.com',
            'role' => 'admin',
            'password' => '123456',
        ]);

        \App\Models\User::factory(20)->create();

        \App\Models\News::factory(50)->create();

        \App\Models\Comment::factory(50)->create();

        \App\Models\Bookmark::factory(30)->create();
    }
}
