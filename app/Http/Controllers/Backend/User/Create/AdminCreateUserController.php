<?php

namespace App\Http\Controllers\Backend\User\Create;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\SearchUserIndex;
use App\RESAC\Defines;
use App\RESAC\Core\Security\RolesFactory;


class AdminCreateUserController extends Controller
{

    public function create(Request $request){

      $form = new \AdminRegisterForm($request->all());

      // Validation
      if($form->is_validate()){

        $data = $form->get_data();

        // Enregistrement
        $user = User::create([
          "nom" => $data["nom"],
          "prenom" => $data["prenom"],
          "username" => $data["username"],
          "email" => $data["email"],
          "password" => Hash::make($data["password"]),
          "version" => Defines::CURRENT_UPDATE_VERSION, // version actuelle des comptes
          "is_student" => 0,
          "staff_role" => $data["role"],
          "user_type" => $data["type"],
          "login_code" => $data["login_code"],
        ]);

        // L'utilisateur est enregistré dans l'index de recherche
        // SearchUserIndex::register($user);

      }else{
        $form->collect_errors();
      }
      
      return response()->json([
        "form" => $form->export_results(),
        "is_errors" => $form->is_errors()
      ]);

    }
}

?>
