<?php

namespace App\Http\Middleware;

use App\Models\Angkatan;
use App\Models\Guru;
use App\Models\PeriodePrakerin;
use App\Models\ProgramKeahlian;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class DataKelas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $angkatan = Angkatan::with('kelas')
            ->orderBy('nama', 'asc')
            ->get();

        $guru = Guru::orderBy('nama', 'asc')
            ->get();

        $program = ProgramKeahlian::orderBy('nama', 'asc')
            ->get();

        $periode = PeriodePrakerin::orderBy('kode', 'asc')
            ->get();

        View::share(['angkatan' => $angkatan, 'guru' => $guru, 'program' => $program, 'periode' => $periode]);

        return $next($request);
    }
}
