<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
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
     * Show the form for creating a new resource.
     */
    public function create()
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
        $getKelas = Kelas::with(['angkatan', 'program', 'siswa', 'siswa', 'guru', 'periode'])
            ->where('id', $kelas)
            ->first();
        
        $siswa = Siswa::where('id_kelas', $kelas)
            ->paginate(10);
        
        return view('dashboard.data.kelas.index')
            ->with(['kelas' => $getKelas, 'id_angkatan' => $angkatan, 'siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
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
