<?php

namespace App\Http\Middleware;

use Closure;

class Asistent
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

        if(!isset($korisnikRola) || $korisnikRola !== 'asistent'){
            return back();
        }

        return $next($request);
    }
}
