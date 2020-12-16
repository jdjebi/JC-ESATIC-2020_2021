<?php

namespace App\Http\Controllers\Resac\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Resac\Core\Posts\PostRenderer;



class PostViewerController extends Controller
{
    public function __construct(){

        $this->middleware('post.view.only.author');

    }

    public function show(Request $request, $id){

        $user = UserAuth();

        $post = Post::findOrFail($id);

        $post = PostRenderer::render_post($post);

        $title = "Publication #".$id;

        return view("app.publications.show",[
            'title' => $title,
            'request' => $request,
            'user' => $user,
            'post' => $post,
            'count' => $this->posts_counter($user)
        ]);

    }

    public function posts_counter($user){
        return [
          'posts' => $user->count_posts,
          'posts_certified' => $user->count_posts,
          'posts_not_certified' => $user->count_not_certified_posts
        ];
      }
}
