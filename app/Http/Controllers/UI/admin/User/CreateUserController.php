<?php

namespace App\Http\Controllers\UI\admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Resac\Auth2;
use App\RESAC\Core\Security\RolesFactory;

class CreateUserController extends Controller
{

  public function __invoke(){

    $title = "Créer un utilisateur";

    $roles = RolesFactory::GetBasicRoles();

    return view("admin.user.create.page",[
      "title" => $title,
      "roles" => $roles,
    ]);

  }

}

?>
