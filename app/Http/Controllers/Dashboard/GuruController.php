<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\GuruExport;
use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Guru?');

        return view('dashboard.guru.index')
            ->with([
                'title' => 'Data Guru',
                'active' => 'Guru', 
                'subActive' => null, 
                'triActive' => null, 
                'guru' => $guru
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.guru.create')
            ->with([
                'title'=> 'Tambah Data Guru',
                'active' => 'Guru',
                'subActive' => null,
                'triActive' => null,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama', $request->input('nama'));
        Session::flash('nip', $request->input('nip'));
        Session::flash('telepon', $request->input('telepon'));

        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'sebagai' => 'required',
            'telepon' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        try {
            Guru::create([
                'slug' => $slug,
                'nama' => $request->input('nama'),
                'nip' => $request->input('nip'),
                'sebagai' => $request->input('sebagai'),
                'telepon' => $request->input('telepon'),
            ]);

            toast('Data Guru berhasil ditambahkan!', 'success');

            return redirect()->route('guru.index');
        } catch (\Exception $e) {
            toast('Data Guru gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('dashboard.guru.detail')
            ->with([
                'title' => 'Detail Guru',
                'active' => 'Guru',
                'subActive' => null,
                'triActive' => null,
                'guru' => $guru,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('dashboard.guru.edit')
            ->with([
                'title' => 'Edit Data Guru',
                'active' => 'Guru',
                'subActive' => null, 
                'triActive' => null,
                'guru' => $guru,
            ]);
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

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        try {
            $guru->update([
                'slug' => $slug,
                'nama' => $request->input('nama'),
                'nip' => $request->input('nip'),
                'sebagai' => $request->input('sebagai'),
                'telepon' => $request->input('telepon'),
            ]);

            toast('Data Guru berhasil diedit!', 'success');

            return redirect()->route('guru.index');
        } catch (\Exception $e) {
            toast('Data Guru gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        toast('Data Guru berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            Excel::import(new GuruImport, $request->file('file'));
    
            toast('Data Guru berhasil diimpor!', 'success');

            return redirect()->route('guru.index');
        } catch(\Exception $e) {
            toast('Data Guru gagal diimpor.', 'warning');

            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new GuruExport, 'Data Guru.xlsx');
    }
}
