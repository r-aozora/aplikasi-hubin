<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Angkatan $angkatan)
    {
        $guru = Guru::whereDoesntHave('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        $program = ProgramKeahlian::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.kelas.create')
            ->with([
                'title' => 'Tambah Data Kelas',
                'active' => 'Siswa', 
                'subActive' => $angkatan->slug,
                'triActive' => null,
                'angkatan' => $angkatan,
                'guru' => $guru,
                'program' => $program,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Angkatan $angkatan)
    {
        Session::flash('nama', $request->input('nama'));
        
        $request->validate([
            'nama' => 'required',
            'guru' => 'required',
            'program' => 'required',
            'angkatan' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            Kelas::create([
                'slug' => $slug,
                'nama' => $request->input('nama'),
                'id_guru' => $request->input('guru'),
                'id_angkatan' => $request->input('angkatan'),
                'id_program' => $request->input('program'),
            ]);
    
            toast('Data Kelas berhasil ditambahkan!', 'success');

            return redirect()->route('angkatan.show', $angkatan->slug);
        } catch (\Exception $e) {
            toast('Data Kelas gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Angkatan $angkatan, Kelas $kelas)
    {
        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Siswa/i?');
        
        return view('dashboard.kelas.detail')
            ->with([
                'title' => 'Data Siswa',
                'active' => 'Siswa', 
                'subActive' => $angkatan->slug,
                'triActive' => $kelas->slug,
                'kelas' => $kelas, 
                'angkatan' => $angkatan, 
                'siswa' => $kelas->siswa,
            ]);
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angkatan $angkatan, Kelas $kelas)
    {
        $guru = Guru::whereDoesntHave('kelas')
            ->orWhere(function ($query) use ($kelas) {
                $query->where('id', $kelas->id_guru);
            })
            ->orderBy('nama', 'asc')
            ->get();

        $program = ProgramKeahlian::get();

        return view('dashboard.kelas.edit')
            ->with([
                'title' => 'Edit Data Kelas',
                'active' => 'Siswa', 
                'subActive' => $angkatan->slug,
                'triActive' => $kelas->slug,
                'angkatan' => $angkatan,
                'guru' => $guru,
                'program' => $program,
                'kelas' => $kelas,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angkatan $angkatan, Kelas $kelas)
    {
        $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'guru' => 'required',
            'program' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            $kelas->update([
                'slug' => $slug,
                'nama' => $request->input('nama'),
                'id_guru' => $request->input('guru'),
                'id_program' => $request->input('program'),
                'id_angkatan' => $request->input('angkatan'),
            ]);
    
            toast('Data Kelas berhasil diedit!', 'success');

            return redirect()->route('angkatan.show', $angkatan);
        } catch (\Exception $e) {
            toast('Data Kelas gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan, Kelas $kelas)
    {
        $kelas->delete();

        toast('Data Kelas berhasil dihapus.', 'success');

        return redirect()->route('angkatan.show', $angkatan);
    }
}
