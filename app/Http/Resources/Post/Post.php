<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class Post extends JsonResource
{ 
    public function toArray($request)
    {
        $post = $this;
        
        $user = User::find($post->user_object->id);

        $user_validator = User::find($post->validate_by);

        if($post->validate_status == 1){
            $user_validator_id = $user_validator->id;
            $user_validator_fullname = $user_validator->fullname;
        }else{
            $user_validator_id = null;
            $user_validator_fullname = null;
        }

        return  [
            'id' => $post->id,
            'user_id' => $post->user_object->id,
            'user' => [
                'id' => $user->id,
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'fullname' => $user->fullname,
                'promo' => $user->promo,
                'universite' => $user->universite,
                'emploi' => $user->emploi,
                'pays' => $user->pays,
                'photo' => photos_cdn_asset($user), 
                'ville' => $user->ville,
                'commune' => $user->commune,
                'numero' => $user->numero,
                'admin_profil_url' => route('admin_user_profil',['id' => $user->id]),
                'profil_url' => route('profil.visitor',$user->id),
            ],
            'scope' => $post->scope,
            'type' => $post->type,
            'date' => $post->date,
            'content' => trim($post->content),
            'text_plain' => trim($post->text_plain),
            'version' => $post->version,
            'validate' => $post->validate,
            'validate_by' => $post->validate_by, 
            'user_validator' => [
                "id" => $user_validator_id,
                "fullname" => $user_validator_fullname
            ],
            'validate_at' => $post->validate_at,
            'validate_status' => $post->validate_status,
            'status'  => $post->status,
            'is_active' => $post->is_active,
            'is_published' => $post->is_published,
            'validate_status_title' => $post->validate_status_title,
            'validate_status_tag' => $post->validate_status_tag
        ];
    }
}
