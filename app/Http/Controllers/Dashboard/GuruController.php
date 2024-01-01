<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\GuruExport;
use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Guru?');

        return view('dashboard.guru.index')
            ->with([
                'title'     => 'Data Guru',
                'active'    => 'Guru', 
                'subActive' => null, 
                'triActive' => null, 
                'guru'      => $guru
            ]);
    }

    public function create()
    {
        return view('dashboard.guru.create')
            ->with([
                'title'     => 'Tambah Data Guru',
                'active'    => 'Guru',
                'subActive' => null,
                'triActive' => null,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => ['required', 'string', 'unique:guru,nama', 'max:255'],
            'nip'       => ['required', 'string', 'unique:guru,nis', 'max:255'],
            'sebagai'   => ['required'],
            'telepon'   => ['required', 'string', 'max:13'],
        ]);

        try {
            Guru::create([
                'slug'    => Str::slug($request->input('nama_guru')),
                'nama'    => $request->input('nama_guru'),
                'nip'     => $request->input('nip'),
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

    public function edit(Guru $guru)
    {
        return view('dashboard.guru.edit')
            ->with([
                'title'     => 'Edit Data Guru',
                'active'    => 'Guru',
                'subActive' => null, 
                'triActive' => null,
                'guru'      => $guru,
            ]);
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => ['required', 'string', 'unique:guru,nama', 'max:255'],
            'nip'       => ['required', 'string', 'unique:guru,nis', 'max:255'],
            'sebagai'   => ['required'],
            'telepon'   => ['required', 'string', 'max:255'],
        ]);

        try {
            $guru->update([
                'slug'    => Str::slug($request->input('nama_guru')),
                'nama'    => $request->input('nama_guru'),
                'nip'     => $request->input('nip'),
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

    public function destroy(Guru $guru)
    {
        $guru->delete();

        toast('Data Guru berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:csv,xls,xlsx']
        ]);

        try {
            Excel::import(new GuruImport, $request->file('file'));
    
            toast('Data Guru berhasil diimpor!', 'success');
        } catch(\Exception $e) {
            toast('Data Guru gagal diimpor.', 'warning');
        }

        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new GuruExport, 'Data Guru.xlsx');
    }
}
