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
                'password' => Hash::make('password'),
                'level' => 'Admin',
                'id_guru' => 1,
            ], [
                'username' => 'admin2',
                'password' => Hash::make('password'),
                'level' => 'Admin',
                'id_guru' => 3,
            ], [
                'username' => 'guru',
                'password' => Hash::make('password'),
                'level' => 'Guru',
                'id_guru' => 2,
            ]
        ]);
    }
}
