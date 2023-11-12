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
            'nama' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            ProgramKeahlian::create([
                'slug' => $slug,
                'nama' => $request->input('nama'),
            ]);
    
            toast('Program Keahlian berhasil ditambahkan!', 'success');
        } catch (\Exception $e) {
            toast('Program Keahlian gagal ditambahkan.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKeahlian $program)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        try {
            $program->update([
                'slug' => $slug,
                'nama' => $request->input('nama'),
            ]);
    
            toast('Program Keahlian berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Program Keahlian gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKeahlian $program)
    {
        $program->delete();

        toast('Program Keahlian berhasil dihapus.', 'success');
        
        return redirect()->back();
    }
}
