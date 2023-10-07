<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class ProgramKeahlianController extends Controller
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
            'kode' => 'required',
            'nama' => 'required',
        ]);

        ProgramKeahlian::create([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);

        toast('Program Keahlian Berhasil Ditambahkan!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramKeahlian $programKeahlian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramKeahlian $programKeahlian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramKeahlian $programKeahlian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramKeahlian $programKeahlian)
    {
        //
    }
}
