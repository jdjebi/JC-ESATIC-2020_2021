<?php

namespace App\Http\Middleware\Resac\Posts;

use Closure;

use App\Models\Post;

class AuthorOnly
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
        /* 
            Autrorise l'accès au post:
            - Au propriétaire
        */

        $user = UserAuth();

        $post_id = $request->route('id');
        $post = Post::findOrFail($post_id);

        $break = false;

        if($post->user != $user->id){
            $break = true;
        }

        if($break){
            \Flash::add("Vous n'avez pas le droit d'accéder à cette page","warning");
            // Si la page de redirection est la page elle même, on redirige sur la page d'accueil
            return redirect()->back(); 
        }else{
            return $next($request);
        }

    }
}
