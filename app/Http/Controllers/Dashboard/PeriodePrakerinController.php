<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PeriodePrakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeriodePrakerinController extends Controller
{
    public function store(Request $request)
    {
        Session::flash('awal_periode', $request->input('awal_periode'));
        Session::flash('akhir_periode', $request->input('akhir_periode'));

        $request->validate([
            'awal_periode' => ['required', 'date', 'before:akhir_periode'],
            'akhir_periode' => ['required', 'date', 'after:awal_periode'],
        ], [
            'awal_periode.before' => 'Awal Periode harus sebelum Akhir Periode',
            'akhir_periode.after' => 'Akhir Periode harus sesudah Awal Periode',
        ]);

        try {
            PeriodePrakerin::create([
                'awal' => $request->input('awal_periode'),
                'akhir' => $request->input('akhir_periode'),
            ]);

            toast('Periode Prakerin berhasil ditambahkan!', 'success');
        } catch (\Exception $e) {
            toast('Periode Prakerin gagal ditambahkan.', 'warning');
        }

        return redirect()->back();
    }

    public function update(Request $request, PeriodePrakerin $periodePrakerin)
    {
        $request->validate([
            'awal_periode' => ['required', 'date', 'before:akhir_periode'],
            'akhir_periode' => ['required', 'date', 'after:awal_periode'],
        ], [
            'awal_periode.before' => 'Awal Periode harus sebelum Akhir Periode',
            'akhir_periode.after' => 'Akhir Periode harus sesudah Awal Periode',
        ]);

        try {
            $periodePrakerin->update([
                'awal' => $request->input('awal_periode'),
                'akhir' => $request->input('akhir_periode'),
            ]);

            toast('Periode Prakerin berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Periode Prakerin gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    public function destroy(PeriodePrakerin $periodePrakerin)
    {
        $periodePrakerin->delete();

        toast('Periode Prakerin berhasil dihapus.', 'success');

        return redirect()->back();
    }
}
