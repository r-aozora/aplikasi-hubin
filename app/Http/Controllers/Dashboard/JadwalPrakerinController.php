<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Angkatan;
use App\Models\JadwalPrakerin;
use App\Http\Controllers\Controller;
use App\Models\PeriodePrakerin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JadwalPrakerinController extends Controller
{
    public function index(Request $request)
    {
        $id_angkatan = $request->id_angkatan === null ? 'all' : $request->id_angkatan;
        $id_periode = $request->id_periode === null ? 'all' : $request->id_periode;

        $jadwal = JadwalPrakerin::with(['kelas', 'kelas.angkatan', 'periode'])
            ->when($id_angkatan !== 'all', function ($query) use ($id_angkatan) {
                return $query->whereHas('kelas', function ($query) use ($id_angkatan) {
                    $query->whereHas('angkatan', function ($query) use ($id_angkatan) {
                        $query->where('id', $id_angkatan);
                    });
                });
            })
            ->when($id_periode !== 'all', function ($query) use ($id_periode) {
                return $query->whereHas('periode', function ($query) use ($id_periode) {
                    $query->where('id', $id_periode);
                });
            })
            ->get();

        $periode = PeriodePrakerin::orderBy('awal', 'asc')
            ->get();

        $angkatan = Angkatan::with('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus data?');
        
        return view('dashboard.jadwal.index')
            ->with([
                'title'     => 'Jadwal & Periode Prakerin',
                'active'    => 'Jadwal', 
                'subActive' => null, 
                'triActive' => null, 
                'jadwal'    => $jadwal, 
                'periode'   => $periode,
                'angkatan'  => $angkatan,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => ['required', 'unique:jadwal_prakerin,id_kelas'],
            'periode' => ['required'],
        ], [
            'kelas.unique' => ':Attribute telah terdaftar di Jadwal Prakerin.',
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

    public function update(Request $request, JadwalPrakerin $jadwal)
    {
            $request->validate([
                'kelas' => ['required', Rule::unique('jadwal_prakerin', 'id_kelas')->ignore($jadwal->id_kelas, 'id_kelas')],
                'periode' => ['required'],
            ], [
                'kelas.unique' => ':Attribute telah terdaftar di Jadwal Prakerin.',
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

    public function destroy(JadwalPrakerin $jadwal)
    {
        $jadwal->delete();

        toast('Jadwal Prakerin berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
