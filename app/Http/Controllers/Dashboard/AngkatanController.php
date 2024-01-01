<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AngkatanController extends Controller
{
    public function index()
    {
        $angkatan = Angkatan::withCount('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Angkatan beserta Kelas didalamnya?');

        return view('dashboard.angkatan.index')
            ->with([
                'title'     => 'Data Angkatan',
                'active'    => 'Siswa',
                'subActive' => 'Angkatan',
                'triActive' => null,
                'angkatan'  => $angkatan,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_angkatan' => ['required', 'unique:angkatan,nama'],
        ]);

        try {
            Angkatan::create([
                'slug' => Str::slug($request->input('tahun_angkatan')),
                'nama' => $request->input('tahun_angkatan'),
            ]);

            toast('Data Angkatan berhasil ditambahkan!', 'success');
        } catch (\Exception $e) {
            toast('Data Angkatan gagal ditambahkan.', 'warning');            
        }

        return redirect()->back();
    }

    public function update(Request $request, Angkatan $angkatan)
    {
        $request->validate([
            'tahun_angkatan' => ['required', 'unique:angkatan,nama'],
        ]);

        try {
            $angkatan->update([
                'slug' => Str::slug($request->input('tahun_angkatan')),
                'nama' => $request->input('tahun_angkatan'),
            ]);
    
            toast('Data Angkatan berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Data Angkatan gagal diedit!', 'warning');
        }

        return redirect()->back();
    }

    public function destroy(Angkatan $angkatan)
    {
        $angkatan->delete();

        toast('Data Angkatan berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
