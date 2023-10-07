<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\ProgramKeahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramKeahlian::insert([
            [
                'kode' => 'RPL',
                'nama' => 'Rekayasa Perangkat Lunak',
            ], [
                'kode' => 'TKJ',
                'nama' => 'Teknik Komputer Jaringan',
            ], [
                'kode' => 'DKV',
                'nama' => 'Desain Komunikasi Visual',
            ]
        ]);

        Angkatan::insert([
            [
                'kode' => '2122',
                'nama' => '2021/2022',
            ], [
                'kode' => '2223',
                'nama' => '2022/2023',
            ], [
                'kode' => '2324',
                'nama' => '2023/2024',
            ]
        ]);

        Kelas::insert([
            [
                'kode' => '12RPL',
                'nama' => 'XII RPL',
                'id_angkatan' => 3,
                'id_guru' => 2,
                'id_program' => 1,
                'id_periode' => null,
            ], [
                'kode' => '11TKJ',
                'nama' => 'XI TKJ',
                'id_angkatan' => 2,
                'id_guru' => 3,
                'id_program' => 2,
                'id_periode' => null,
            ], [
                'kode' => '10DKV',
                'nama' => 'X DKV',
                'id_angkatan' => 1,
                'id_guru' => 1,
                'id_program' => 3,
                'id_periode' => null,
            ]
        ]);
    }
}
