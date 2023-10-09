<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
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
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
