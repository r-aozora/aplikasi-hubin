<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Guru::create([
                'nama' => $row['nama'],
                'nip' => $row['nip'],
                'sebagai' => $row['sebagai'],
                'telepon' => $row['telepon'],
            ]);
        }
    }
}
