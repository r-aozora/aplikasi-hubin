<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Guru::insert([
                'slug' => Str::slug($row['nama']),
                'nama' => $row['nama'],
                'nip' => $row['nip'],
                'sebagai' => $row['sebagai'],
                'telepon' => $row['telepon'],
            ]);
        }
    }
}
