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
        User::create([
            'name' => 'gian',
            'username' => 'gian',
            'password' => bcrypt('gian1234'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            'role' => 'admin',
            // 'foto' => 'sajidan.png'
        ]
    );
        User::create([
            'name' => 'ali',
            'username' => 'ali',
            'password' => bcrypt('ali1234'),
            'phone' => '085123456789',
            'address' => 'Jl. Raya No. 123',
            // 'foto' => 'tangkal.jpg'
        ]);
    }
}
