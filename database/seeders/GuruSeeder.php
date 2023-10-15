<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::insert([
            [
                'nama' => strtoupper('Muhamad Citra Hidayat'),
                'nip' => '123456789',
                'sebagai' => 'Pendamping',
                'telepon' => '089513886227',
            ], [
                'nama' => strtoupper('Yasser Aziz Alfalah'),
                'nip' => '123456789',
                'sebagai' => 'Walikelas',
                'telepon' => '08987654321',
            ], [
                'nama' => strtoupper('Surya Nata Ardhana'),
                'nip' => '123456789',
                'sebagai' => 'Pendamping',
                'telepon' => '08123456789',
            ], [
                'nama' => strtoupper('Arnold Darmawan'),
                'nip' => '123456789',
                'sebagai' => 'Pendamping',
                'telepon' => '08123456789',
            ]
        ]);
    }
}
