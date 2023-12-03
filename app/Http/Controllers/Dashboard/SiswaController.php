<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $kelas = Kelas::orderBy('nama', 'asc')->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus data Siswa/i?');

        return view('dashboard.siswa.index')
            ->with([
                'title'     => 'Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa',
                'triActive' => null,
                'siswa'     => $siswa,
                'kelas'     => $kelas,
            ]);
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama', 'asc')->get();

        return view('dashboard.siswa.create')
            ->with([
                'title'     => 'Tambah Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa',
                'triActive' => null,
                'kelas'     => $kelas,
            ]);
    }

    public function store(Request $request)
    {
        Session::flash('nama_siswa', $request->input('nama_siswa'));
        Session::flash('nis', $request->input('nis'));
        Session::flash('nisn', $request->input('nisn'));
        Session::flash('jenis_kelamin', $request->input('jenis_kelamin'));
        Session::flash('telepon_siswa', $request->input('telepon_siswa'));
        Session::flash('telepon_orang_tua', $request->input('telepon_orang_tua'));
        Session::flash('email', $request->input('email'));
        Session::flash('alamat', $request->input('alamat'));

        $request->validate([
            'nama_siswa'        => 'required|string|max:255',
            'nis'               => 'required|unique:siswa,nis|max:255',
            'nisn'              => 'required|unique:siswa,nisn|max:10',
            'jenis_kelamin'     => 'required',
            'telepon_siswa'     => 'required',
            'telepon_orang_tua' => 'required',
            'email'             => 'required|email|unique:siswa,email',
            'alamat'            => 'required',
            'kelas'             => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama_siswa'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        $siswa = [
            'slug'         => $slug,
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
            
            return redirect()->route('siswa.index');
        } catch (\Exception $e) {
            toast('Data Siswa gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    public function show(Siswa $siswa)
    {
        return view('dashboard.siswa.detail')
            ->with([
                'title'     => 'Detail Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa',
                'triActive' => null,
                'siswa'     => $siswa,
            ]);
    }

    public function edit(Siswa $siswa)
    {   
        $kelas = Kelas::orderBy('nama', 'asc')->get();

        return view('dashboard.siswa.edit')
            ->with([
                'title'     => 'Edit Data Siswa',
                'active'    => 'Siswa',
                'subActive' => 'Siswa', 
                'triActive' => null,
                'siswa'     => $siswa,
                'kelas'     => $kelas,
            ]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama_siswa'        => 'required|string|max:255',
            'nis'               => 'required',
            'nisn'              => 'required',
            'jenis_kelamin'     => 'required',
            'telepon_siswa'     => 'required',
            'telepon_orang_tua' => 'required',
            'email'             => 'required|email',
            'alamat'            => 'required',
            'kelas'             => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama_siswa'));
        $slug = strtolower(str_replace(' ', '-', $nama));

        $update = [
            'slug'         => $slug,
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
            
            return redirect()->route('siswa.index');
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
