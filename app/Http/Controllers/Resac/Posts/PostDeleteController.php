<?php

namespace App\Http\Controllers\Resac\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use Resac\Auth2;

class PostDeleteController extends Controller
{
    public function __construct(){

        $this->middleware('post.delete.only.member_or_admin');

    }

    public function __invoke(Request $request, $id){

        $post = Post::findOrFail($id);
        $post->delete();

        \Flash::add("Publication supprimée","success");

        // Si la page de redirection est la page elle même, on redirige sur la page d'accueil
        return redirect()->back();

    }      
}
