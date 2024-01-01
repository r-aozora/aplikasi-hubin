<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $id_kelas = $request->id_kelas;

        $siswa = Siswa::with('kelas')
            ->when(strlen($id_kelas), function ($query) use ($id_kelas) {
                return $query->where('id_kelas', $id_kelas);
            })
            ->orderBy('nama', 'asc')
            ->get();

        $angkatan = Angkatan::with('kelas')
                ->orderBy('nama', 'asc')
                ->get();
        
        $kelas = $id_kelas ? Kelas::where('id', $id_kelas)->first() : null;

        confirmDelete('Hapus Data?', 'Yakin ingin hapus data Siswa/i?');

        return view('dashboard.siswa.index')
            ->with([
                'title'     => 'Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa',
                'triActive' => null,
                'siswa'     => $siswa,
                'angkatan'  => $angkatan,
                'kelas'     => $kelas,
            ]);
    }

    public function create()
    {
        $angkatan = Angkatan::with('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.siswa.create')
            ->with([
                'title'     => 'Tambah Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa',
                'triActive' => null,
                'angkatan'  => $angkatan,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa'        => ['required', 'string', 'unique:siswa,nama' ,'max:255'],
            'nis'               => ['required', 'string', 'unique:siswa,nis', 'max:255'],
            'nisn'              => ['required', 'string', 'unique:siswa,nisn', 'digits:10'],
            'jenis_kelamin'     => ['required'],
            'telepon_siswa'     => ['required', 'string', 'max:13'],
            'telepon_orang_tua' => ['required', 'string', 'max:13'],
            'email'             => ['required', 'email', 'unique:siswa,email'],
            'alamat'            => ['required'],
            'kelas'             => ['required'],
        ]);

        $siswa = [
            'slug'         => Str::slug($request->input('nama_siswa')),
            'nama'         => $request->input('nama_siswa'),
            'nis'          => $request->input('nis'),
            'nisn'         => $request->input('nisn'),
            'jkel'         => $request->input('jenis_kelamin'),
            'telepon'      => $request->input('telepon_siswa'),
            'telepon_ortu' => $request->input('telepon_orang_tua'),
            'email'        => $request->input('email'),
            'alamat'       => $request->input('alamat'),
            'id_kelas'     => $request->input('kelas'),
        ];

        try {
            Siswa::create($siswa);
    
            toast('Data Siswa berhasil ditambahkan!', 'success');
            
            return redirect()->route('siswa.index', '?id_kelas=' . $request->input('kelas'));
        } catch (\Exception $e) {
            toast('Data Siswa gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    public function show(Siswa $siswa)
    {
        return view('dashboard.siswa.detail')
            ->with([
                'title'     => 'Detail Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa',
                'triActive' => null,
                'siswa'     => $siswa,
            ]);
    }

    public function edit(Siswa $siswa)
    {   
        $angkatan = Angkatan::with('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.siswa.edit')
            ->with([
                'title'     => 'Edit Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa', 
                'triActive' => null,
                'siswa'     => $siswa,
                'angkatan'  => $angkatan,
            ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa'        => ['required', 'string', 'unique:siswa,nama', 'max:255'],
            'nis'               => ['required', 'string', 'unique:siswa,nis', 'max:255'],
            'nisn'              => ['required', 'string', 'unique:siswa,nisn', 'digits:10'],
            'jenis_kelamin'     => ['required'],
            'telepon_siswa'     => ['required', 'string', 'max:255'],
            'telepon_orang_tua' => ['required', 'string', 'max:255'],
            'email'             => ['required', 'email', 'unique:siswa,email'],
            'alamat'            => ['required'],
            'kelas'             => ['required'],
        ]);

        $update = [
            'slug'         => Str::slug($request->input('nama_siswa')),
            'nama'         => $request->input('nama_siswa'),
            'nis'          => $request->input('nis'),
            'nisn'         => $request->input('nisn'),
            'jkel'         => $request->input('jenis_kelamin'),
            'telepon'      => $request->input('telepon_siswa'),
            'telepon_ortu' => $request->input('telepon_orang_tua'),
            'email'        => $request->input('email'),
            'alamat'       => $request->input('alamat'),
            'id_kelas'     => $request->input('kelas'),
        ];

        try {
            $siswa->update($update);
    
            toast('Data Siswa berhasil diedit!', 'success');
            
            return redirect()->route('siswa.index', '?id_kelas=' . $request->input('kelas'));
        } catch (\Exception $e) {
            toast('Data Siswa gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        toast('Data Siswa berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
