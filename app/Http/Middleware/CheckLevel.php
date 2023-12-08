<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$level): Response
    {
        if(in_array(Auth::user()->level, $level)){
            return $next($request);
        }

        toast('Anda tidak punya akses!', 'warning');

        return redirect()->back();
    }
}
