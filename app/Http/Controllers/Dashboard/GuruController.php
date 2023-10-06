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
            'nama' => 'required',
            'nip' => 'required',
            'sebagai' => 'required',
            'telepon' => 'required',
        ]);

        $guru = [
            'nama' => $request->input('nama'),
            'nip' => $request->input('nip'),
            'sebagai' => $request->input('sebagai'),
            'telepon' => $request->input('telepon'),
        ];

        Guru::create($guru);

        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
