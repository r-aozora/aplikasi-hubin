<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'guru' => 'required',
            'program' => 'required',
            'periode' => 'nullable',
        ]);

        Kelas::create([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
            'id_angkatan' => $request->input('angkatan'),
            'id_guru' => $request->input('guru'),
            'id_program' => $request->input('program'),
            'id_periode' => $request->input('periode'),
        ]);

        toast('Kelas berhasil ditambahkan!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($angkatan, $kelas)
    {
        $getKelas = Kelas::with(['angkatan', 'program', 'siswa', 'guru'])
            ->where('id', $kelas)
            ->first();
        
        $siswa = Siswa::where('id_kelas', $kelas)
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data!', 'Hapus data Siswa/i?');
        
        return view('dashboard.data.kelas.detail')
            ->with(['kelas' => $getKelas, 'id_angkatan' => $angkatan, 'siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
