<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $korisnikRola = \Auth::user()->rola->naziv;
        // dd($korisnikRola);

        if(!isset($korisnikRola) || $korisnikRola !== 'admin'){
            return back();
        }

        return $next($request);
    }
}
