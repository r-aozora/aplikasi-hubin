<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class GuruExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::orderBy('nama', 'asc')->get();
    }

    public function map($guru): array
    {
        return [
            $guru->nama,
            $guru->nip,
            $guru->sebagai,
            $guru->telepon,
        ];
    }

    public function headings(): array
    {
        return [
            'NAMA',
            'NIP',
            'SEBAGAI',
            'TELEPON',
        ];
    }
}
