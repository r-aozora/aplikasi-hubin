<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\PerusahaanExport;
use App\Imports\PerusahaanImport;
use App\Models\Perusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Perusahaan?');

        return view('dashboard.perusahaan.index')
            ->with([
                'title'      => 'Data Perusahaan', 
                'active'     => 'Perusahaan', 
                'subActive'  => null, 
                'triActive'  => null, 
                'perusahaan' => $perusahaan
            ]);
    }

    public function create()
    {
        return view('dashboard.perusahaan.create')
            ->with([
                'title'     => 'Tambah Data Perusahaan',
                'active'    => 'Perusahaan',
                'subActive' => null,
                'triActive' => null,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => ['required', 'string', 'unique:perusahaan,nama', 'max:255'],
            'alamat'          => ['required', 'string', 'max:255'],
            'penerima_surat'  => ['nullable', 'string', 'max:255'],
            'kecamatan'       => ['required', 'string', 'max:255'],
            'kota/kabupaten'  => ['required', 'string', 'max:255'],
            'provinsi'        => ['required', 'string', 'max:255'],
            'lokasi'          => ['required'],
            'telepon'         => ['nullable', 'string', 'max:255'],
            'koordinat'       => ['nullable'],
        ]);

        $perusahaan = [
            'slug'      => Str::slug($request->input('nama_perusahaan')),
            'nama'      => strtoupper($request->input('nama_perusahaan')),
            'alamat'    => $request->input('alamat'),
            'penerima'  => $request->input('penerima_surat'),
            'kecamatan' => $request->input('kecamatan'),
            'kota'      => $request->input('kota/kabupaten'),
            'provinsi'  => $request->input('provinsi'),
            'lokasi'    => $request->input('lokasi'),
            'telepon'   => $request->input('telepon'),
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

    public function show(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaan.detail')
            ->with([
                'title'      => 'Detail Data Perusahaan',
                'active'     => 'Perusahaan',
                'subActive'  => null,
                'triActive'  => null,
                'perusahaan' => $perusahaan,
            ]);
    }

    public function edit(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaan.edit')
            ->with([
                'title'      => 'Edit Data Perusahaan',
                'active'     => 'Perusahaan',
                'subActive'  => null, 
                'triActive'  => null,
                'perusahaan' => $perusahaan,
            ]);
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_perusahaan' => ['required', 'string', 'unique:perusahaan,nama', 'max:255'],
            'alamat'          => ['required', 'string', 'max:255'],
            'penerima_surat'  => ['nullable', 'string', 'max:255'],
            'kecamatan'       => ['required', 'string', 'max:255'],
            'kota/kabupaten'  => ['required', 'string', 'max:255'],
            'provinsi'        => ['required', 'string', 'max:255'],
            'lokasi'          => ['required'],
            'telepon'         => ['nullable', 'string', 'max:255'],
            'koordinat'       => ['nullable'],
        ]);

        $update = [
            'slug'      => Str::slug($request->input('nama_perusahaan')),
            'nama'      => strtoupper($request->input('nama_perusahaan')),
            'alamat'    => $request->input('alamat'),
            'penerima'  => $request->input('penerima_surat'),
            'kecamatan' => $request->input('kecamatan'),
            'kota'      => $request->input('kota/kabupaten'),
            'provinsi'  => $request->input('provinsi'),
            'lokasi'    => $request->input('lokasi'),
            'telepon'   => $request->input('telepon'),
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
        } catch(\Exception $e) {
            toast('Data Perusahaan gagal diimpor.', 'warning');
        }

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new PerusahaanExport, 'Data Perusahaan Prakerin.xlsx');
    }
}
