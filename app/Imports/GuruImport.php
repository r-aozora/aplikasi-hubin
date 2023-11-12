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
            $nama = preg_replace('/[^a-z0-9]+/i', ' ', $row['nama']);
            $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

            Guru::insert([
                'slug' => $slug,
                'nama' => $row['nama'],
                'nip' => $row['nip'],
                'sebagai' => $row['sebagai'],
                'telepon' => $row['telepon'],
            ]);
        }
    }
}
