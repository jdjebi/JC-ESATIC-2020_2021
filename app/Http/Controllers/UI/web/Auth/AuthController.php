<?php

namespace App\Http\Controllers\UI\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;
use App\User;


class AuthController extends Controller
{

    public function login(Request $request){

      $title2 = "Connexion";
      $redirect_url = $request->has('redirect') ? $request->redirect : "";

      return view('app.auth.connexion',[
        "redirect_url" => $redirect_url,
        "title2" => $title2
      ]);
    }

    public function register(){

    }

    public function culture_login(Request $request){

      $title2 = "Connexion";
      $redirect_url = $request->has('redirect') ? $request->redirect : "";

      return view('app.auth.login',[
        "redirect_url" => $redirect_url,
        "title2" => $title2
      ]);

    }

    public function culture_login2(Request $request){

      $title2 = "Connexion";
      $redirect_url = $request->has('redirect') ? $request->redirect : "";

      return view('app.auth.login3',[
        "redirect_url" => $redirect_url,
        "title2" => $title2
      ]);

    }

    public function culture_register(){

      $form = new \RegisterForm2($_POST);

      $errors = null;

      // Récupération des erreurs issues du traitement Backend
      if(session("form_export")){
        $form->import_data(session("form_export"));
        session()->put("form_export",null);
        $errors = $form->get_errors();
      }

      $title2 = "Créer un Compte";

      return view('app.auth.register',[
        "title2" => $title2,
        "form" => $form,
        "errors" => $errors
      ]);

    }
}

?>
