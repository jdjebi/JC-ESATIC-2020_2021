<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{

    public function libre(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        $user = UserAuth();

        $post = new Post([
            "user" => $user->id,
            "user_id" => $user->id,
            "content" => $request->content,
            "validate" => false,
            "status" => Post::BROUILLON,
            "validate_status" => Post::NEUTRE,
        ]);

        // Si l'utilisateur a les droits de modération, la publication est directement certifiée
        if($user->is_moderateur){
            $post->validate_status = Post::CERTIFIE;
            $post->validate_at = new \DateTime();
            $post->validate_by = $user->id;
        }

        $post->save();

        \Flash::add("Publication enregistrée");


        return redirect()->route("admin.manage_pub",$post->id);
    }

    public function from_member(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        $user = UserAuth();

        $post = new Post([
            "user" => $user->id,
            "user_id" => $user->id,
            "content" => $request->content,
            "validate" => false,
            "status" => Post::BROUILLON,
            "validate_status" => Post::NEUTRE
        ]);

        $post->save();

        \Flash::add("Publication enregistrée");

        return redirect()->back();
    }

}
