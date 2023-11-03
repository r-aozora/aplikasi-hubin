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
                'slug' => 'anas-chaerudin-maulana-s-kom',
                'nama' => 'ANAS CHAERUDIN MAULANA, S.Kom',
                'nip' => '123456789',
                'sebagai' => 'Walikelas',
                'telepon' => '089513886227',
            ], [
                'slug' => 'komariah-s-kom',
                'nama' => 'KOMARIAH, S.Kom',
                'nip' => '123456789',
                'sebagai' => 'Pendamping',
                'telepon' => '08987654321',
            ], [
                'slug' => 'wahyudin-s-kom',
                'nama' => 'WAHYUDIN, S.Kom',
                'nip' => '123456789',
                'sebagai' => 'Walikelas',
                'telepon' => '08123456789',
            ]
        ]);
    }
}
