<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::orderBy('nama', 'asc')
            ->paginate(10);

        return view('dashboard.guru.index')
            ->with(['gurus' => $gurus]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'sebagai' => 'required',
            'telepon' => 'required',
        ]);

        Guru::create([
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'sebagai' => $request->input('sebagai'),
            'telepon' => $request->input('telepon'),
        ]);

        return redirect('/guru');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'sebagai' => 'required',
            'telepon' => 'required',
        ]);

        $guru->update([
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'sebagai' => $request->input('sebagai'),
            'telepon' => $request->input('telepon'),
        ]);

        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
