<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToCollection, WithHeadingRow
{
    private $kelas;

    public function __construct($kelas)
    {
        $this->kelas = $kelas;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            switch ($row['jenis_kelamin']) {
                case 'Laki-Laki':
                    $jenis_kelamin = 'L';
                    break;
                case 'Perempuan':
                    $jenis_kelamin = 'P';
                    break;
            }

            Siswa::insert([
                'slug'          => Str::slug($row['nama']),
                'nama'          => $row['nama'],
                'nis'           => $row['nis'],
                'nisn'          => $row['nisn'],
                'jenis_kelamin' => $jenis_kelamin,
                'telepon'       => $row['telepon'],
                'telepon_ortu'  => $row['telepon_orang_tua'],
                'email'         => $row['email'],
                'alamat'        => $row['alamat'],
                'id_kelas'      => $this->kelas,
            ]);
        }
    }
}
