<?php

namespace App\Http\Controllers\UI\admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{

    public function index(){
        $title = "Rôles et permissions";
        return view("admin.roles_permissions.index.page",[
            "title" => $title
        ]);
    }

    public function show(Request $request, $id){
        $title = "Rôle #".$id;
        return view("admin.roles_permissions.role.show",[
            "title" => $title,
            "role_id"  => $id,
        ]);
    }

    public function permissons(){
        return "";
    }

}

?>
