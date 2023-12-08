<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'level' => 'admin',
                'id_guru' => 1,
            ], [
                'username' => 'admin2',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password'),
                'level' => 'admin',
                'id_guru' => 3,
            ], [
                'username' => 'guru',
                'email' => 'guru@example.com',
                'password' => Hash::make('password'),
                'level' => 'guru',
                'id_guru' => 2,
            ]
        ]);
    }
}
