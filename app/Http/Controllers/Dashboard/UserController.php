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
        $users = User::with('guru')
            ->join('guru', 'users.id_guru', '=', 'guru.id')
            ->orderBy('guru.nama', 'asc')
            ->paginate(10);

        $notUsers = Guru::whereDoesntHave('user')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.user.index')
            ->with(['users' => $users, 'notUsers' => $notUsers]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
