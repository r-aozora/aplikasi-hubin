<?php

namespace App\Imports;

use App\Models\Perusahaan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerusahaanImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Perusahaan::create([
                'nama' => $row['nama_perusahaan'],
                'alamat' => $row['alamat'],
                'penerima' => $row['penerima_surat'],
                'kecamatan' => $row['kecamatan'],
                'kota' => $row['kotakabupaten'],
                'provinsi' => $row['provinsi'],
                'lokasi' => $row['lokasi'],
                'telepon' => $row['telepon'],
                'koordinat' => $row['koordinat'],
            ]);
        }
    }
}
