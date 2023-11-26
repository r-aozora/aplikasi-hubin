<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            Angkatan::create([
                'slug' => $slug,
                'nama' => $request->input('nama'),
            ]);

            toast('Data Angkatan berhasil ditambahkan!', 'success');
        } catch (\Exception $e) {
            toast('Data Angkatan gagal ditambahkan.', 'warning');            
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Angkatan $angkatan)
    {
        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Kelas beserta Siswa/i didalamnya?');
        
        return view('dashboard.angkatan.detail')
            ->with([
                'title' => 'Data Kelas',
                'active' => 'Siswa', 
                'subActive' => 'Kelas',
                'triActive' => null,
                'angkatan' => $angkatan,
                'kelas' => $angkatan->kelas,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            $angkatan->update([
                'slug' => $slug,
                'nama' => $request->input('nama'),
            ]);
    
            toast('Data Angkatan berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Data Angkatan gagal diedit!', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan)
    {
        $angkatan->delete();

        toast('Data Angkatan berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
