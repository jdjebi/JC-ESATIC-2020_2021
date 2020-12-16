<?php

namespace App\Http\Middleware\Resac\Admin;

use Closure;
use Resac\Auth2;

class GuestAdmin
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
      if(Auth2::is_admin_logged()){
        return redirect()->route('admin_index');
      }
      return $next($request);
    }
}
