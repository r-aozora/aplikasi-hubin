<?php

namespace App\Imports;

use App\Models\Perusahaan;
use Maatwebsite\Excel\Concerns\ToModel;

class PerusahaanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Perusahaan([
            'nama' => $row[0],
            'alamat' => $row[1],
            'kecamatan' => $row[2],
            'kota' => $row[3],
            'provinsi' => $row[4],
            'telepon' => $row[5],
        ]);
    }
}
