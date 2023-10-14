<?php

namespace App\Exports;

use App\Models\Perusahaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PerusahaanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $perusahaan = Perusahaan::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.perusahaan.export')
            ->with(['perusahaan' => $perusahaan]);
    }
}
