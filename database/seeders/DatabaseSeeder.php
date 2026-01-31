<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Admin Catering',
            'email' => 'admin@catering.test',
            'password' => Hash::make('dile2022'),
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'Owner Catering',
            'email' => 'owner@catering.test',
            'password' => Hash::make('dile2022'),
            'level' => 'owner',
        ]);

        User::create([
            'name' => 'Kurir Utama',
            'email' => 'kurir@catering.test',
            'password' => Hash::make('dile2022'),
            'level' => 'kurir',
        ]);
    }
}
