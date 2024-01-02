<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard')->with([
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'subActive' => null,
            'triActive' => null,
        ]);
    }

    public function setting()
    {
        return view('dashboard.setting')->with([
            'title' => 'Pengaturan',
            'active' => 'Pengaturan',
            'subActive' => null,
            'triActive' => null,
        ]);
    }
}
