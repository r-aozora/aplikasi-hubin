<?php

namespace App\Exports;

use App\Models\Kelas;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    private $kelas;

    public function __construct($kelas)
    {
        $this->kelas = $kelas;
    }

    public function collection()
    {
        return Siswa::where('id_kelas', $this->kelas)
            ->orderBy('nama', 'asc')
            ->get();
    }

    public function map($siswa): array
    {
        $data = [
            $siswa->nama,
            $siswa->nis,
            $siswa->nisn,
            $siswa->jenis_kelamin,
            $siswa->telepon,
            $siswa->telepon_ortu,
            $siswa->email,
            $siswa->alamat,
        ];


        return $data;
    }

    public function headings(): array
    {
        $header = [
            'NAMA',
            'NIS',
            'NISN',
            'JENIS KELAMIN',
            'TELEPON',
            'TELEPON ORANG TUA',
            'EMAIL',
            'ALAMAT',
        ];

        return $header;
    }
}
