<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\JadwalPrakerin;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\PeriodePrakerin;
use Illuminate\Http\Request;

class JadwalPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy('nama', 'asc')
            ->get();

        $jadwal = JadwalPrakerin::with(['kelas', 'kelas.guru', 'kelas.angkatan', 'periode'])
            ->get();

        $periode = PeriodePrakerin::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.jadwal.index')
            ->with([
                'title' => 'Jadwal Prakerin',
                'active' => 'Jadwal', 
                'subActive' => null, 
                'triActive' => null, 
                'kelas' => $kelas,
                'jadwal' => $jadwal, 
                'periode' => $periode,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required',
            'periode' => 'required',
        ]);

        try {
            JadwalPrakerin::create([
                'id_kelas' => $request->input('kelas'),
                'id_periode' => $request->input('periode'),
            ]);
    
            toast('Jadwal Prakerin berhasil ditambahkan!', 'success');
        } catch (\Exception $e) {
            toast('Jadwal Prakerin gagal ditambahkan.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPrakerin $jadwal)
    {
        $request->validate([
            'kelas' => 'required',
            'periode' => 'required',
        ]);

        try {
            $jadwal->update([
                'id_kelas' => $request->input('kelas'),
                'id_periode' => $request->input('periode'),
            ]);

            toast('Jadwal Prakerin berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Jadwal Prakerin gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPrakerin $jadwal)
    {
        $jadwal->delete();

        toast('Jadwal Prakerin berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
