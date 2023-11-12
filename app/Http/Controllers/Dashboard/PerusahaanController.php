<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PerusahaanExport;
use App\Imports\PerusahaanImport;
use App\Models\Perusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan = Perusahaan::orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Perusahaan?');

        return view('dashboard.perusahaan.index')
            ->with([
                'title' => 'Data Perusahaan', 
                'active' => 'Perusahaan', 
                'subActive' => null, 
                'triActive' => null, 
                'perusahaan' => $perusahaan
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.perusahaan.create')
            ->with([
                'title'=> 'Tambah Data Perusahaan',
                'active' => 'Perusahaan',
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
        Session::flash('alamat', $request->input('alamat'));
        Session::flash('penerima', $request->input('penerima'));
        Session::flash('kecamatan', $request->input('kecamatan'));
        Session::flash('kota', $request->input('kota'));
        Session::flash('provinsi', $request->input('provinsi'));
        Session::flash('lokasi', $request->input('lokasi'));
        Session::flash('telepon', $request->input('telepon'));
        Session::flash('koordinat', $request->input('koordinat'));

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'penerima' => 'nullable',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'lokasi' => 'required',
            'telepon' => 'nullable',
            'koordinat' => 'nullable'
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        $perusahaan = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'penerima' => $request->input('penerima'),
            'kecamatan' => $request->input('kecamatan'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi'),
            'lokasi' => $request->input('lokasi'),
            'telepon' => $request->input('telepon'),
            'koordinat' => $request->input('koordinat'),
        ];

        try {
            Perusahaan::create($perusahaan);
    
            toast('Data Perusahaan berhasil ditambahakan!', 'success');

            return redirect()->route('perusahaan.index');
        } catch (\Exception $e) {
            toast('Data Perusahaan gagal ditambahakan!', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaan.detail')
            ->with([
                'title'=> 'Detail Data Perusahaan',
                'active' => 'Perusahaan',
                'subActive' => null,
                'triActive' => null,
                'item' => $perusahaan,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaan.edit')
            ->with([
                'title' => 'Edit Data Perusahaan',
                'active' => 'Perusahaan',
                'subActive' => null, 
                'triActive' => null,
                'perusahaan' => $perusahaan,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'penerima' => 'nullable',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'lokasi' => 'required',
            'telepon' => 'nullable',
            'koordinat' => 'nullable'
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        $update = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'penerima' => $request->input('penerima'),
            'kecamatan' => $request->input('kecamatan'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi'),
            'lokasi' => $request->input('lokasi'),
            'telepon' => $request->input('telepon'),
            'koordinat' => $request->input('koordinat'),
        ];

        try {
            $perusahaan->update($update);
    
            toast('Data Perusahaan berhasil diedit!', 'success');

            return redirect()->route('perusahaan.index');
        } catch (\Exception $e) {
            toast('Data Perusahaan gagal diedit!', 'warning');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        toast('Data Perusahaan berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            Excel::import(new PerusahaanImport, $request->file('file'));
    
            toast('Data Perusahaan berhasil diimpor!', 'success');

            return redirect()->route('perusahaan.index');
        } catch(\Exception $e) {
            toast('Data Perusahaan gagal diimpor.', 'warning');

            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new PerusahaanExport, 'Data Perusahaan Prakerin.xlsx');
    }
}
