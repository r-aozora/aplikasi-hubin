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
                'username' => 'citrahdy',
                'password' => Hash::make('password'),
                'level' => 'Admin',
                'id_guru' => 1,
            ], [
                'username' => 'nataardhana',
                'password' => Hash::make('password'),
                'level' => 'Admin',
                'id_guru' => 3,
            ], [
                'username' => 'azizalfalah',
                'password' => Hash::make('password'),
                'level' => 'Guru',
                'id_guru' => 2,
            ]
        ]);
    }
}
