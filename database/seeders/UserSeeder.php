<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Daffa J',
            'email' => 'daffa@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@gmail.com',
            'password' => Hash::make('password')
        ]);

        // Tambahkan pengguna lainnya sesuai kebutuhan

        $this->command->info('Sample users created successfully.');
    }
}

