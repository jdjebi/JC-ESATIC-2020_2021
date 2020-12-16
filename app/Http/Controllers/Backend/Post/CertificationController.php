<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use App\User;

use Illuminate\Http\Request;

class CertificationController extends Controller
{

    function start(Request $request, $id, $certif_author){

        $post = Post::find($id);
        $post->validate_status = Post::EN_ATTENTE;
        $post->save();
        return "start";
    }

    function set(Request $request, $id, $certif_author){
        $post = Post::find($id);
        $user = User::find($certif_author);
        $post->validate_status = Post::ACCEPTE;
        $post->validate_by = $certif_author;
        $post->validate_at = new \Datetime();
        $post->save();
        return json_encode([
            "user" => [
                "id" => $user->id,
                "fullname" => $user->fullname
            ],
            "validate_status" => $post->validate_status,
            "validate_by" => $post->validate_by,
            "validate_at" => $post->validate_at->format('d-m-Y H:i:s')
        ]);
    }

    function cancel(Request $request, $id, $certif_author){
        $post = Post::find($id);
        $user = User::find($certif_author);
        $post->validate_status = Post::EN_ATTENTE;
        $post->validate_by = $certif_author;
        $post->validate_at = new \Datetime();
        $post->is_active = false;
        $post->save();
        return json_encode([
            "user" => [
                "id" => $user->id,
                "fullname" => $user->fullname
            ],
            "validate_status" => $post->validate_status,
            "validate_by" => $post->validate_by,
            "validate_at" => $post->validate_at->format('d-m-Y H:i:s'),
            "is_active" => $post->is_active
        ]);
    }

}
