<?php

namespace App\Http\Middleware\Resac;;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestOnly
{
    /* Redirige si l'utilisateur est connecté */

    public function handle($request, Closure $next)
    {

        if(Auth::check()){
          return redirect()->route("app.activites.index");
        }

        return $next($request);
    }
}
