<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => password_hash("12345678", PASSWORD_DEFAULT),
        ]);

        $admin->assignRole('admin');
        
        $editor = User::updateOrCreate([
            'name' => 'editor',
            'email' => 'editor@example.com',
            'password' => password_hash("12345678", PASSWORD_DEFAULT),
        ]);

        $editor->assignRole('editor');
    }
}
