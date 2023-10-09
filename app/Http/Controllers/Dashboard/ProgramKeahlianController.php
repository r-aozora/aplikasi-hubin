<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class ProgramKeahlianController extends Controller
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

        ProgramKeahlian::create([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);

        toast('Program Keahlian berhasil ditambahkan!', 'success');
        return redirect('/data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKeahlian $program)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $program->update([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);

        toast('Program Keahlian berhasil diedit!');
        return redirect('/data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKeahlian $program)
    {
        $program->delete();

        toast('Program Keahlian berhasil dihapus!');
        return redirect('/data');
    }
}
