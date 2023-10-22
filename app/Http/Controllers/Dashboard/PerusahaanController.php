<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PerusahaanExport;
use App\Imports\PerusahaanImport;
use App\Models\Perusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        confirmDelete('Hapus Data!', 'Hapus data Perusahaan?');

        return view('dashboard.perusahaan.index')
            ->with(['active' => 'Perusahaan', 'subActive' => null, 'triActive' => null, 'perusahaan' => $perusahaan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'penerima' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'lokasi' => 'required',
            'telepon' => 'required',
            'koordinat' => 'required'
        ]);

        Perusahaan::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'penerima' => $request->input('penerima'),
            'kecamatan' => $request->input('kecamatan'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi'),
            'lokasi' => $request->input('lokasi'),
            'telepon' => $request->input('telepon'),
            'koordinat' => $request->input('koordinat'),
        ]);

        toast('Data Perusahaan berhasil ditambahakan!', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaan.detail')
            ->with(['item' => $perusahaan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'penerima' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'lokasi' => 'required',
            'telepon' => 'required',
            'koordinat' => 'required'
        ]);

        $perusahaan->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'penerima' => $request->input('penerima'),
            'kecamatan' => $request->input('kecamatan'),
            'kota' => $request->input('kota'),
            'provinsi' => $request->input('provinsi'),
            'lokasi' => $request->input('lokasi'),
            'telepon' => $request->input('telepon'),
            'koordinat' => $request->input('koordinat'),
        ]);

        toast('Data Perusahaan berhasil diedit!', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        toast('Data Perusahaan berhasil dihapus!', 'success');
        return redirect()->back();
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        try {
            Excel::import(new PerusahaanImport(), $request->file('file'));
    
            toast('Data berhasil diimpor!', 'success');
        } catch(\Exception $e) {
            toast('Data gagal diimpor!', 'danger');
        }
        
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new PerusahaanExport, 'Data Perusahaan Prakerin.xlsx');
    }
}
