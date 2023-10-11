<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'nama' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'jkel' => 'required',
            'telepon' => 'required',
            'telepon_ortu' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::create([
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'jenis_kelamin' => $request->input('jkel'),
            'telepon' => $request->input('telepon'),
            'telepon_ortu' => $request->input('telepon_ortu'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'id_kelas' => $request->input('id_kelas'),
        ]);

        toast('Data Siswa berhasil ditambahkan!', 'success');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $angkatan, $kelas, $siswa)
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
            'id_kelas' => 'required',
        ]);

        Siswa::where('id', $siswa)->update([
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'nisn' => $request->input('nisn'),
            'jenis_kelamin' => $request->input('jkel'),
            'telepon' => $request->input('telepon'),
            'telepon_ortu' => $request->input('telepon_ortu'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'id_kelas' => $request->input('id_kelas'),
        ]);

        toast('Data Siswa berhasil diedit!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($angkatan, $kelas, $siswa)
    {
        Siswa::where('id', $siswa)->delete();

        toast('Data Siswa berhasil dihapus!');
        return redirect()->back();
    }
}
