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
        $angkatan = Angkatan::with('kelas')
            ->orderBy('nama', 'asc')
            ->withCount('kelas')
            ->get();

        $program = ProgramKeahlian::with('kelas')
            ->orderBy('nama', 'asc')
            ->withCount('kelas')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data?');

        return view('dashboard.data.index')->with([
            'title' => 'Kelola Data',
            'active' => 'Data',
            'subActive' => null,
            'triActive' => null,
            'angkatan' => $angkatan, 
            'program' => $program, 
        ]);
    }
}
