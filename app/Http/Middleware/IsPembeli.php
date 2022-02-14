<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPembeli
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if ($user->role != 'pembeli') {
            abort(403, 'Ini adalah halaman khusus pembeli');
        }
        
        return $next($request);
    }
}
