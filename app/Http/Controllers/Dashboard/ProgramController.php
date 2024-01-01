<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
                'title'     => 'Program Keahlian',
                'active'    => 'Siswa',
                'subActive' => 'Program',
                'triActive' => null,
                'program'   => $program
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'program_keahlian' => ['required', 'string', 'unique:program_keahlian,nama'],
        ]);

        try {
            Program::create([
                'slug' => Str::slug($request->input('program_keahlian')),
                'nama' => $request->input('program_keahlian'),
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
            'program_keahlian' => ['required', 'string', 'unique:program_keahlian,nama'],
        ]);

        try {
            $program->update([
                'slug' => Str::slug($request->input('program_keahlian')),
                'nama' => $request->input('program_keahlian'),
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
