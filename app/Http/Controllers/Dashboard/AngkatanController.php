<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        Angkatan::create([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);

        toast('Angkatan berhasil ditambahkan!', 'success');
        return redirect('/data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $angkatan->update([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);

        toast('Angkatan berhasil diedit!');
        return redirect('/data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan)
    {
        $angkatan->delete();

        toast('Angkatan berhasil dihapus!');
        return redirect('/data');
    }
}
