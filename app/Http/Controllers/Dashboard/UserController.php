<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('guru')->get();

        confirmDelete('Hapus Data?', 'Yakin ingin hapus Data User?');

        return view('dashboard.user.index')
            ->with([
                'title'     => 'Data User',
                'active'    => 'User',
                'subActive' => null,
                'triActive' => null,
                'user'      => $user,
            ]);
    }

    public function create()
    {
        $notUser = Guru::whereDoesntHave('user')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.user.create')
            ->with([
                'title'     => 'Tambah Data User',
                'active'    => 'User',
                'subActive' => null,
                'triActive' => null,
                'notUser'   => $notUser,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => ['required'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'username'  => ['required', 'string', 'unique:users,username', 'max:255'],
            'password'  => ['required'],
            'level'     => ['required'],
        ]);

        try {
            User::create([
                'email'    => $request->input('email'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'level'    => $request->input('level'),
                'id_guru'  => $request->input('nama_guru'),
            ]);
            
            toast('Data User berhasil ditambahkan!', 'success');

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            toast('Data User gagal ditambahkan.', 'warning');

            return redirect()->back();
        }
    }

    public function edit(User $user)
    {
        $notUser = Guru::whereDoesntHave('user')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.user.edit')
            ->with([
                'title'     => 'Edit Data User',
                'active'    => 'User',
                'subActive' => null, 
                'triActive' => null,
                'user'      => $user,
                'notUser'   => $notUser,
            ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama_guru' => ['required'],
            'email'     => ['required', 'email', 'unique:users,email'],
            'username'  => ['required', 'string', 'unique:users,username', 'max:255'],
            'level'     => ['required'],
        ]);

        try {
            $user->update([
                'email'    => $request->input('email'),
                'username' => $request->input('username'),
                'level'    => $request->input('level'),
                'id_guru'  => $request->input('nama_guru'),
            ]);
    
            toast('Data User berhasil diedit!', 'success');

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            toast('Data User gagal diedit.', 'warning');

            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        toast('Data User berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
