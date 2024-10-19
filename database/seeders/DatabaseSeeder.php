<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(LevelSeeder::class);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => password_hash("12345678", PASSWORD_DEFAULT),
        ]);
    }
}
