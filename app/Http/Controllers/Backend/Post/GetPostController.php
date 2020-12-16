<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post\PostCollection as PostResources;
use App\Http\Resources\Post\PostMixCollection as PostMixResources;
use App\Http\Resources\Post\Post as PostJSON;

use App\Resac\Core\Posts\PostRenderer;

class GetPostController extends Controller
{
    public function by_id(Request $request, $id){
        $post = Post::find($id);
        $post = $this->apply_param($request, $post);
        return new PostJSON($post);
    }

    public function user_posts(Request $request, $id){
        $posts = Post::where("user",$id)->orderBy('date','desc')->get();
        $posts = $this->apply_params($request, $posts);
        return new PostResources($posts);
    }

    public function all_posts(Request $request){

        $posts = NULL;
        $posts_query = Post::select("*")->orderBy('date','desc');

        if($request->has("status") && $request->input("status")){
            $status = $request->input("status");
            if($status == "published"){
                $posts_query = Post::select("*")
                            ->where("status",Post::PUBLIE)
                            ->where("validate_status",Post::CERTIFIE)
                            ->where("is_active",true)
                            ->orderBy('date','desc');
            }
        }

        $posts = $posts_query->get();

        $posts = $this->apply_params($request, $posts);

        return new PostMixResources($posts);
    }

    public function published(Request $request){
        $posts = Post::where("status",Post::PUBLIE)
            ->where("validate_status",Post::CERTIFIE)
            ->orderBy('date','desc')
            ->get();     
        $posts = $this->apply_params($request, $posts);
        return new PostMixResources($posts);
    }

    public function apply_params(Request $request, $posts){
        if($request->filled('content')){
            if($request->content == "rich-text"){
                $posts = PostRenderer::render_posts($posts);
            }
        }
        return $posts;
    }

    public function apply_param(Request $request, $post){     
        if($request->filled('content')){
            if($request->content == "rich-text"){
                $post->text_plain = $post->content;
                $post = PostRenderer::render_post($post);
            }
        }
        return $post;
    }
}
