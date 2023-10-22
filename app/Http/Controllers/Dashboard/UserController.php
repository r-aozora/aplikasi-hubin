<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('guru')
            ->get();

        $notUser = Guru::whereDoesntHave('user')
            ->orderBy('nama', 'asc')
            ->get();

        confirmDelete('Hapus Data!', 'Hapus data User?');

        return view('dashboard.user.index')
            ->with(['active' => 'User', 'subActive' => null, 'triActive' => null, 'user' => $user, 'notUser' => $notUser]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'level' => $request->input('level'),
            'id_guru' => $request->input('nama'),
        ]);

        toast('Data berhasil ditambahkan!','success');
        return redirect('/user');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'level' => 'required',
        ]);

        $user->update([
            'username' => $request->input('username'),
            'level' => $request->input('level'),
            'id_guru' => $request->input('nama'),
        ]);

        toast('Data berhasil di edit!','success');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        toast('Data berhasil dihapus!','success');
        return redirect('/user');
    }
}
