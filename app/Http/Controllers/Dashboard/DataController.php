<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Guru;
use App\Models\PeriodePrakerin;
use App\Models\ProgramKeahlian;

class DataController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('nama', 'asc')
            ->get();

        $angkatan = Angkatan::orderBy('nama', 'asc')
            ->get();

        $program = ProgramKeahlian::orderBy('nama', 'asc')
            ->get();

        $periode = PeriodePrakerin::orderBy('kode', 'asc')
            ->get();
            
        return view('dashboard.data.index')->with([
            'guru' => $guru, 
            'angkatan' => $angkatan, 
            'program' => $program, 
            'periode' => $periode
        ]);
    }
}
