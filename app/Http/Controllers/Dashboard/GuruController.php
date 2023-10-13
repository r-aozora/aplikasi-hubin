<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\GuruExport;
use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::orderBy('nama', 'asc')
            ->paginate(10);

        confirmDelete('Hapus Data!', 'Hapus data Guru?');

        return view('dashboard.guru.index')
            ->with(['guru' => $guru]);
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

        toast('Data berhasil ditambahkan!','success');
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

        toast('Data berhasil di edit!','success');
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        toast('Data berhasil dihapus!','success');
        return redirect('/guru');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        Excel::import(new GuruImport(), $request->file('file'));

        toast('Data berhasil diimpor!', 'success');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new GuruExport(), 'Data Guru.xlsx');
    }
}
