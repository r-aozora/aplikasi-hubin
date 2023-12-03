<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::insert([
            [
                'slug' => 'rekayasa-perangkat-lunak',
                'nama' => 'Rekayasa Perangkat Lunak',
            ], [
                'slug' => 'teknik-geomatika',
                'nama' => 'Teknik Geomatika',
            ], [
                'slug' => 'desain-pemodelan-dan-info-bangunan',
                'nama' => 'Desain Pemodelan dan Info Bangunan',
            ], [
                'slug' => 'bisnis-kontruksi-dan-properti',
                'nama' => 'Bisnis Kontruksi dan Properti',
            ], [
                'slug' => 'teknik-instalasi-tenaga-listrik',
                'nama' => 'Teknik Instalasi Tenaga Listrik',
            ], [
                'slug' => 'teknik-pemesinan',
                'nama' => 'Teknik Pemesinan',
            ], [
                'slug' => 'teknik-mekanik-industri',
                'nama' => 'Teknik Mekanik Industri',
            ], [
                'slug' => 'desain-gambar-masin',
                'nama' => 'Desain Gambar Mesin',
            ], [
                'slug' => 'teknik-perawatan-gedung',
                'nama' => 'Teknik Perawatan Gedung',
            ], [
                'slug' => 'teknik-otomasi-industri',
                'nama' => 'Teknik Otomasi Industri',
            ]
        ]);

        Angkatan::insert([
            [
                'slug' => '2022-2023',
                'nama' => '2022/2023',
            ], [
                'slug' => '2023-2024',
                'nama' => '2023/2024',
            ]
        ]);

        Kelas::insert([
            [
                'slug' => 'xii-rpl',
                'nama' => 'XII RPL',
                'id_guru' => 1,
                'id_angkatan' => 2,
                'id_program' => 1,
            ], [
                'slug' => 'xi-rpl-1',
                'nama' => 'XI RPL 1',
                'id_guru' => 3,
                'id_angkatan' => 1,
                'id_program' => 1,
            ]
        ]);
    }
}
