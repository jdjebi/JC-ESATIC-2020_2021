<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostDeleteController extends Controller
{
    public function __construct(){
        $this->middleware('post.delete.only.member_or_admin')->only('__invoke');
        $this->middleware('post.view.only.author')->only('my_post');  
    }

    public function __invoke(Request $request, $id){

        $post = Post::findOrFail($id);
        $post->delete();

        \Flash::add("Publication supprimée","success");

        // Si la page de redirection est la page elle même, on redirige sur la page d'accueil
        return redirect()->back();

    }   

    public function my_post(Request $request, $id){

        $post = Post::findOrFail($id);
        $post->delete();

        \Flash::add("Publication supprimée","success");

        // Si la page de redirection est la page elle même, on redirige sur la page d'accueil
        return redirect()->back();

    }   

    public function api(Request $request, $id){
        return "";
    }
    
    
}
