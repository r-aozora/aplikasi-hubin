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
                'nama' => strtoupper('Anas Chaerudin Maulana').', S.Kom',
                'nip' => '123456789',
                'sebagai' => 'Walikelas',
                'telepon' => '089513886227',
            ], [
                'nama' => strtoupper('Komariah').', S.Kom',
                'nip' => '123456789',
                'sebagai' => 'Pendamping',
                'telepon' => '08987654321',
            ], [
                'nama' => strtoupper('Wahyudin').', S.Kom',
                'nip' => '123456789',
                'sebagai' => 'Walikelas',
                'telepon' => '08123456789',
            ]
        ]);
    }
}
