<?php

namespace App\Http\Middleware\Resac\Admin;

use Closure;
use Resac\Auth2;


class LoginAdmin
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
        $redirect_url = route("admin")."?redirect=". $request->path();

        if(!Auth2::is_admin_logged()){
          \Flash::add("Vous devez être connecté pour avoir accès à cette page.","warning");
          return redirect($redirect_url);
        }
        return $next($request);
    }
}
