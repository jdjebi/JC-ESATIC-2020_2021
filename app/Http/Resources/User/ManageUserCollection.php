<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ManageUserCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $users_tmp = $this->collection;

        $users = [];

        foreach ($users_tmp as $user) {
            if($user->nom != "auto-gen"){
                $users[] = [
                    'id' => $user->id,
                    'nom' => empty($user->nom) ? $user->login_code : $user->nom,
                    'prenom' => empty($user->prenom) ? "" : $user->prenom,
                    'email' => $user->email,
                    'username' => $user->username,
                    'role' => $user->staff_role,
                    'type' => $user->type,
                    'photo' => asset(photos_cdn_asset($user)),
                    'admin_profil_url' => route('admin_user_profil',['id' => $user->id]),
                    'date_creation' => $user->created_at
                ];
            }
        }

        return $users;
    }
}
