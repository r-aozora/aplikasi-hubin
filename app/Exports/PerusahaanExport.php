<?php

namespace App\Exports;

use App\Models\Perusahaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PerusahaanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Perusahaan::orderBy('nama', 'asc')->get();
    }

    public function map($perusahaan): array
    {
        return [
            $perusahaan->nama,
            $perusahaan->alamat,
            $perusahaan->penerima,
            $perusahaan->kecamatan,
            $perusahaan->kota,
            $perusahaan->provinsi,
            $perusahaan->lokasi,
            $perusahaan->telepon,
            $perusahaan->koordinat,
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA PERUSAHAAN',
            'ALAMAT',
            'PENERIMA SURAT',
            'KECAMATAN',
            'KOTA/KABUPATEN',
            'PROVINSI',
            'LOKASI',
            'TELEPON',
            'KOORDINAT',
        ];
    }
}
