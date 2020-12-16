<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use App\User;

use Illuminate\Http\Request;

use App\Resac\Core\Posts\PostRenderer;

class PostUpdateController extends Controller
{

    function content(Request $request, $id){
        $post = Post::find($id);
        $post->content = $request->content;
        $post->save();

        $post->text_plain = $post->content;
        $post = PostRenderer::render_post($post);

        return json_encode([
            "content" => $post->text_plain,
            "text_plain" => $post->content
        ]);
    }

}
