<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JadwalPrakerin;
use App\Http\Controllers\Controller;
use App\Models\PeriodePrakerin;
use Illuminate\Http\Request;

class JadwalPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = JadwalPrakerin::with(['kelas', 'kelas.guru', 'kelas.angkatan', 'periode'])
            ->get();

        $periode = PeriodePrakerin::orderBy('kode', 'asc')
            ->get();

        return view('dashboard.jadwal.index')
            ->with(['jadwal' => $jadwal, 'periode' => $periode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPrakerin $jadwalPrakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPrakerin $jadwalPrakerin)
    {
        //
    }
}
