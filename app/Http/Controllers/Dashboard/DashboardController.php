<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
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
        $angkatan = Angkatan::with('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        return view('dashboard.setting')->with([
            'title' => 'Pengaturan',
            'active' => 'Pengaturan',
            'subActive' => null,
            'triActive' => null,
            'angkatan' => $angkatan,
            'kelas' => null,
        ]);
    }
}
