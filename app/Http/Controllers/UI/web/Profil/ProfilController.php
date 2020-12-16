<?php

namespace App\Http\Controllers\UI\Web\Profil;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Resac\Core\Posts\PostRenderer;

class ProfilController extends Controller
{
    public function user(Request $request)   {
        $user = UserAuth();

        $show_portofolio = false;

        $title = $user->fullname;

        $user_visited = $user;

        if($request->has('id')){
          $id = $request->id;
          $user_visited = User::find($id);
  
          if(!$user_visited){
            \Flash::add("Utilisateur introuvable","danger");
            return redirect()->route('explorer');
          }
  
          $show_portofolio = true;
          $title =  $user_visited->nom.' '.$user_visited->prenom;
        }

        $posts = Post::where("user",$user->id)->orderBy('date', 'desc')->get();

        $posts = PostRenderer::render_posts($posts);

        return view('app.profil.index',[
            'title' => $title,
            'posts' => $posts,
            'user' => $user,
            'user_visited' => $user_visited,
            'show_portofolio' => $show_portofolio
          ]);

    }

    public function visitor(Request $request, $id)   {
        $user = UserAuth();

        $title = $user->fullname;

        $user_visited = User::find($id);

        if(!$user_visited){
            \Flash::add("Utilisateur introuvable","danger");
            return redirect()->route('explorer');
        }
  
        $title =  $user_visited->nom.' '.$user_visited->prenom;

        $posts = Post::where("user",$user_visited)->orderBy('date', 'desc')->get();

        $posts = PostRenderer::render_posts($posts);

        return view('app.profil.index',[
            'title' => $title,
            'posts' => $posts,
            'user' => $user,
            'user_visited' => $user_visited,
            'show_portofolio' => true
        ]);

    }

    public function user_new(Request $request)
{
        $user = UserAuth();

        $show_portofolio = false;

        $title = $user->fullname;

        $posts = Post::where("user",$user->id)->orderBy('date', 'desc')->get();

        $posts = PostRenderer::render_posts($posts);

        return view('app.profil.index_vue',[
            'title' => $title,
            'posts' => $posts,
            'user' => $user,
            'show_portofolio' => $show_portofolio
          ]);

    }

}

?>
