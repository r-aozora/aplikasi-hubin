<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function create()
    {
        return view('login');
    }

    function store(Request $request)
    {
        Session::flash('username', $request->username);

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/home');
        } else {
            return redirect()->back();
        }
    }

    function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
