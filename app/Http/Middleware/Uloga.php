<?php

namespace App\Http\Middleware;

use Closure;

class Uloga
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
       if(auth()->user()->uloga == 'admin'){
            return redirect('/admin');
        }
         if(auth()->user()->uloga == 'asistent'){
            return redirect('/asistent');
        }
        if(auth()->user()->uloga == 'doktor'){
            return redirect('/doktor');
        }
        return $next($request);
//        return redirect(‘home’)->with(‘error’,"You don't have admin access.");
/* 
        $korisnikRola = \Auth::user()->rola->naziv;

        if($korisnikRola == 'admin')
            return redirect('/admin');
        if($korisnikRola == 'asistent')
            return redirect('/asistent');
        if($korisnikRola == 'doktor')
            return redirect('/doktor');

        return $next($request);
*/

    }
}
