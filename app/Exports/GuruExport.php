<?php

namespace App\Exports;

use App\Models\Guru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GuruExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $guru = Guru::orderBy('nama', 'asc')
            ->get();
            
        return view('dashboard.guru.export')
            ->with(['guru' => $guru]);
    }
}
