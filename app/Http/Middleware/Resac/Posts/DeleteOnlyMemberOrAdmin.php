<?php

namespace App\Http\Middleware\Resac\Posts;

use Closure;

use App\Models\Post;
use Resac\Auth2;

class DeleteOnlyMemberOrAdmin
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
            Autrorise l'accès à la supression du post:
            - Au propriétaire
            - A un l'administrateur
        */

        $user = Auth2::user();

        $post_id = $request->route('id');
        $post = Post::findOrFail($post_id);

        $break = true;

        if(Auth2::is_admin_logged()){
            $break = false;
        } else if($post->user != $user->id){
            $break = true;
        }

        if($break){
            \Flash::add("Vous n'avez pas le droit de supprimer cette publication","warning");
            // Si la page de redirection est la page elle même, on redirige sur la page d'accueil
            return redirect()->back(); 
        }else{
            return $next($request);
        }

    }
}
