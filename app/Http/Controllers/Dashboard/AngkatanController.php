<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AngkatanController extends Controller
{
    public function index()
    {
        $angkatan = Angkatan::withCount('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Angkatan beserta Kelas didalamnya??');

        return view('dashboard.angkatan.index')
            ->with([
                'title' => 'Data Angkatan',
                'active' => 'Siswa',
                'subActive' => 'Angkatan',
                'triActive' => null,
                'angkatan' => $angkatan,
            ]);
    }

    public function store(Request $request)
    {
        Session::flash('tahun_angkatan', $request->input('tahun_angkatan'));

        $request->validate([
            'tahun_angkatan' => ['required', 'unique:angkatan,nama'],
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('tahun_angkatan'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            Angkatan::create([
                'slug' => $slug,
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

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('tahun_angkatan'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            $angkatan->update([
                'slug' => $slug,
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
