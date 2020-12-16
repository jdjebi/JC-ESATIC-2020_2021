<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostStateController extends Controller
{

    public function lock(Request $request, $id){
        $post = Post::find($id);
        $post->is_active = false;
        $post->save();
        return json_encode([]);
    }   

    public function unlock(Request $request, $id){
        $post = Post::find($id);
        $post->is_active = true;
        $post->save();
        return json_encode([]);
    } 
  
    public function archive(Request $request, $id){
        $post = Post::find($id);
        $post->status = 2;
        $post->save();
        return json_encode([]);
    }

    public function publish(Request $request, $id){
        $post = Post::find($id);
        $post->status = 1;
        $post->is_active = 1;
        $post->is_published = 1;
        $post->save();
        return json_encode([]);
    } 

  
}
