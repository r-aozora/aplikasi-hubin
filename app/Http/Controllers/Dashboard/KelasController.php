<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $id_angkatan = $request->id_angkatan;

        $kelas = Kelas::with(['angkatan', 'program'])
            ->when(strlen($id_angkatan), function ($query) use ($id_angkatan) {
                return $query->where('id_angkatan', $id_angkatan);
            })
            ->withCount('siswa')
            ->orderBy('nama', 'asc')
            ->get();

        $angkatan = Angkatan::orderBy('nama', 'asc')->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data Kelas beserta Siswa/i didalamnya?');

        return view('dashboard.kelas.index')
            ->with([
                'title'     => 'Data Kelas',
                'active'    => 'Siswa',
                'subActive' => 'Kelas',
                'triActive' => null,
                'kelas'     => $kelas,
                'angkatan'  => $angkatan,
            ]);
    }

    public function create()
    {
        $guru = Guru::whereDoesntHave('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        $program = Program::orderBy('nama', 'asc')
            ->get();

        $angkatan = Angkatan::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.kelas.create')
            ->with([
                'title'     => 'Tambah Data Kelas',
                'active'    => 'Siswa', 
                'subActive' => 'Kelas',
                'triActive' => null,
                'guru'      => $guru,
                'program'   => $program,
                'angkatan'  => $angkatan,
            ]);
    }

    public function store(Request $request, )
    {
        Session::flash('nama_kelas', $request->input('nama_kelas'));
        
        $request->validate([
            'nama_kelas' => 'required',
            'guru'       => 'required',
            'program'    => 'required',
            'angkatan'   => 'required',
        ]);

        $angkatan = Angkatan::where('id', $request->input('angkatan'))->first();
        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama_kelas'));
        $slug = $angkatan->slug . '-' . strtolower(str_replace(' ', '-', $nama));

        try {
            Kelas::create([
                'slug'        => $slug,
                'nama'        => $request->input('nama_kelas'),
                'id_guru'     => $request->input('guru'),
                'id_program'  => $request->input('program'),
                'id_angkatan' => $angkatan->id,
            ]);
    
            toast('Data Kelas berhasil ditambahkan!', 'success');

            return redirect('/dashboard/kelas?id_angkatan=' . $angkatan->id);
        } catch (\Exception $e) {
            toast('Data Kelas gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }


    public function edit(Kelas $kelas)
    {
        $guru = Guru::whereDoesntHave('kelas')
            ->orWhere(function ($query) use ($kelas) {
                $query->where('id', $kelas->id_guru);
            })
            ->orderBy('nama', 'asc')
            ->get();

        $program = Program::orderBy('nama', 'asc')
            ->get();

        $angkatan = Angkatan::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.kelas.edit')
            ->with([
                'title'     => 'Edit Data Kelas',
                'active'    => 'Siswa', 
                'subActive' => 'Kelas',
                'triActive' => null,
                'guru'      => $guru,
                'program'   => $program,
                'angkatan'  => $angkatan,
                'kelas'     => $kelas,
            ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'guru'       => 'required',
            'program'    => 'required',
            'angkatan'   => 'required',
        ]);

        $angkatan = Angkatan::where('id', $request->input('angkatan'))->first();
        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama_kelas'));
        $slug = $angkatan->slug . '-' . strtolower(str_replace(' ', '-', $nama));

        try {
            $kelas->update([
                'slug'        => $slug,
                'nama'        => $request->input('nama_kelas'),
                'id_guru'     => $request->input('guru'),
                'id_program'  => $request->input('program'),
                'id_angkatan' => $angkatan->id,
            ]);
    
            toast('Data Kelas berhasil diedit!', 'success');

            return redirect('/dashboard/kelas?id_angkatan=' . $angkatan->id);
        } catch (\Exception $e) {
            toast('Data Kelas gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        toast('Data Kelas berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
