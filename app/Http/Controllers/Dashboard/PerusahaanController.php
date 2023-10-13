<?php

namespace App\Http\Controllers\Dashboard;

use App\Imports\PerusahaanImport;
use App\Models\Perusahaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan = Perusahaan::orderBy('nama', 'asc')
            ->get();

        return view('dashboard.perusahaan.index')
            ->with(['perusahaan' => $perusahaan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        //
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new PerusahaanImport(), $request->file('file'));

        toast('Data berhasil diimpor!', 'success');
        return redirect()->back();
    }
}
