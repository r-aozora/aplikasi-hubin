<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\ProgramKeahlian;
use App\Models\Siswa;
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
                'kode' => ' PK01',
                'nama' => 'Rekayasa Perangkat Lunak',
            ], [
                'kode' => 'PK02',
                'nama' => 'Teknik Geomatika',
            ], [
                'kode' => 'PK03',
                'nama' => 'Desain Pemodelan dan Info Bangunan',
            ], [
                'kode' => 'PK04',
                'nama' => 'Bisnis Kontruksi dan Properti',
            ], [
                'kode' => 'PK05',
                'nama' => 'Teknik Instalasi Tenaga Listrik',
            ], [
                'kode' => 'PK06',
                'nama' => 'Teknik Pemesinan',
            ], [
                'kode' => 'PK07',
                'nama' => 'Teknik Mekanik Industri',
            ], [
                'kode' => 'PK08',
                'nama' => 'Desain Gambar Mesin',
            ], [
                'kode' => 'PK09',
                'nama' => 'Teknik Perawatan Gedung',
            ], [
                'kode' => 'PK10',
                'nama' => 'Teknik Otomasi Industri',
            ]
        ]);

        Angkatan::insert([
            [
                'kode' => '2223',
                'nama' => '2022/2023',
            ], [
                'kode' => '2324',
                'nama' => '2023/2024',
            ]
        ]);

        Kelas::insert([
            [
                'kode' => 'RPL23',
                'nama' => 'XII RPL',
                'id_angkatan' => 2,
                'id_guru' => 1,
                'id_program' => 1,
                'id_periode' => null,
            ], [
                'kode' => '1RPL22',
                'nama' => 'XI RPL 1',
                'id_angkatan' => 1,
                'id_guru' => 3,
                'id_program' => 1,
                'id_periode' => null,
            ]
        ]);
    }
}
