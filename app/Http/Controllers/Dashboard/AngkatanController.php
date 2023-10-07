<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
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

        Angkatan::create([
            'kode' => $request->input('kode'),
            'nama' => $request->input('nama'),
        ]);

        toast('Angkatan berhasil ditambahkan!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Angkatan $angkatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angkatan $angkatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan)
    {
        //
    }
}
