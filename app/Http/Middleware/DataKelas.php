<?php

namespace App\Http\Middleware;

use App\Models\Angkatan;
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

        View::share(['dataAngkatan' => $angkatan]);

        return $next($request);
    }
}
