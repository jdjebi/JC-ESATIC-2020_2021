<?php

namespace App\Http\Middleware\Resac;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthOnly
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

        $redirect_url = route("login")."?redirect=".  url()->full();

        if(!Auth::check()){
          \Flash::add("Vous devez être connecté pour avoir accès à la page demandée.","warning");
          return redirect($redirect_url);
        }

        return $next($request);
    }
}
