<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User\MainData as UserMainDataResources;
use App\Http\Resources\User\ManageUserCollection;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Role\RoleCollection;

class RolesPermissions extends Controller
{
 
    public function get_roles(Request $request, $id){
        $user = User::find($id);

        $data = [];

        if(!$user){
            $data['error'] = true;
            $data['message'] = "Utilisateur introuvable";
            return response()->json($data);
        }

        $roles_name = $user->getRoleNames();

        $roles = Role::whereIn('name',$roles_name)->orderBy('name')->get();

        $data["data"] = new RoleCollection($roles);

        if($request->filled("include_available_roles") && $request->input("include_available_roles") == true){
            $roles_available = Role::whereNotIn('name',$roles_name)->orderBy('name')->get();
            $data["roles_available"] = new RoleCollection($roles_available);
        }

        return response()->json($data);
    }

    public function put_roles(Request $request, $id){

        $user = User::find($id);

        $data = [];
        $data['error'] = false;

        if(!$user){
            $data['error'] = true;
            $data['message'] = "Utilisateur introuvable";
            return response()->json($data);
        }

        // Vérifie que tous les rôles sont correctes

        $roles = $request->roles;

        $roles_array = [];

        foreach ($roles as $role) {
            $roles_array[] = strtolower($role['name']);
        }

        /*
            - Si parmis les rôles, un rôle de niveau administratrateur figure, on confère le droit d'accéder à l'admin
            - Sinon on le lui retire
        */

        $user->syncRoles($roles_array);

        $data['message'] = "Mise à jour des rôles éffectuées";
        
        return response()->json($data);
    }
 
}

?>
