<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Angkatan $angkatan, Kelas $kelas)
    {
        return view('dashboard.siswa.create')
            ->with([
                'title'=> 'Tambah Data Siswa',
                'active' => 'Siswa',
                'subActive' => $angkatan->slug,
                'triActive' => $kelas->slug,
                'angkatan' => $angkatan,
                'kelas' => $kelas,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Angkatan $angkatan, Kelas $kelas)
    {
        Session::flash('nama', $request->input('nama'));
        Session::flash('nis', $request->input('nis'));
        Session::flash('nisn', $request->input('nisn'));
        Session::flash('jkel', $request->input('jkel'));
        Session::flash('telepon', $request->input('telepon'));
        Session::flash('telepon_ortu', $request->input('telepon_ortu'));
        Session::flash('email', $request->input('email'));
        Session::flash('alamat', $request->input('alamat'));

        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'jkel' => 'required',
            'telepon' => 'required',
            'telepon_ortu' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        $siswa = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'jenis_kelamin' => $request->input('jkel'),
            'telepon' => $request->input('telepon'),
            'telepon_ortu' => $request->input('telepon_ortu'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'id_kelas' => $kelas->id,
        ];

        try {
            Siswa::create($siswa);
    
            toast('Data Siswa berhasil ditambahkan!', 'success');
            
            return redirect()->route('kelas.show', [$angkatan, $kelas]);
        } catch (\Exception $e) {
            toast('Data Siswa gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Angkatan $angkatan, Kelas $kelas, Siswa $siswa)
    {
        return view('dashboard.Siswa.detail')
            ->with([
                'title' => 'Detail Siswa',
                'active' => 'Siswa',
                'subActive' => $angkatan->slug,
                'triActive' => $kelas->slug,
                'angkatan' => $angkatan,
                'kelas' => $kelas,
                'siswa' => $siswa,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angkatan $angkatan, Kelas $kelas, Siswa $siswa)
    {
        return view('dashboard.siswa.edit')
            ->with([
                'title' => 'Edit Data Siswa',
                'active' => 'Siswa',
                'subActive' => $angkatan->slug, 
                'triActive' => $kelas->slug,
                'angkatan' => $angkatan,
                'kelas' => $kelas,
                'siswa' => $siswa,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angkatan $angkatan, Kelas $kelas, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'jkel' => 'required',
            'telepon' => 'required',
            'telepon_ortu' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        $update = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'jenis_kelamin' => $request->input('jkel'),
            'telepon' => $request->input('telepon'),
            'telepon_ortu' => $request->input('telepon_ortu'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'id_kelas' => $kelas->id,
        ];

        try {
            $siswa->update($update);
    
            toast('Data Siswa berhasil diedit!', 'success');
            
            return redirect()->route('kelas.show', [$angkatan, $kelas]);
        } catch (\Exception $e) {
            toast('Data Siswa gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan, Kelas $kelas, Siswa $siswa)
    {
        $siswa->delete();

        toast('Data Siswa berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
