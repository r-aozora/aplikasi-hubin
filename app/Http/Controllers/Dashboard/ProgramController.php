<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $program = Program::orderBy('nama', 'asc')
            ->withCount('kelas')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin menghapus Program Keahlian?');

        return view('dashboard.program.index')
            ->with([
                'title' => 'Program Keahlian',
                'active' => 'Siswa',
                'subActive' => 'Program',
                'triActive' => null,
                'program' => $program
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
            Program::create([
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
    public function update(Request $request, Program $program)
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
    public function destroy(Program $program)
    {
        $program->delete();

        toast('Program Keahlian berhasil dihapus.', 'success');
        
        return redirect()->back();
    }
}
