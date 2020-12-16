<?php

namespace App\Http\Controllers\UI\Web\Compte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;

class CompteController extends Controller
{
 
    public function photo(Request $request){

        $user = UserAuth();
  
        $title = "Compte - Photo";
  
        return view("app.params.photo2",[
          'user' => $user,
          'title' => $title,
        ]);
    }
 
    public function pass(Request $request){

        $user = UserAuth();
  
        $FormPass = new \Form\User\Update\Password($_POST);

        if(session("form_export")){
          $FormPass->import_data(session("form_export"));
          session()->put("form_export",null);
        }
  
        $title = "Compte - Mot de passe";
  
        return view("app.params.pass",[
          'user' => $user,
          'title' => $title,
          'FormPass' => $FormPass,
        ]);
    }

    public function general(Request $request){

      $user = UserAuth();

      $FormInfo = new \Form\User\Update\Info();

      $FormInfo->set_default($this->general_user_infos($user));

      $FormInfo->register_array('pays',\Country::codes());

      if(session("form_export")){
        $FormInfo->import_data(session("form_export"));
        session()->put("form_export",null);
      }

      $countries_data = \Country::all();
      $json_countries = \Country::json();

      $title = "Compte - Général";
      $edit_form = "infos";

      return view("app.params.general",[
        'user' => $user,
        'title' => $title,
        'FormInfo' => $FormInfo,
        'edit_form' => $edit_form,
        'countries_data' => $countries_data,
        'json_countries' => $json_countries
      ]);
    }

    public function general_user_infos($user){
      return [
        "nom" => $user->nom,
        "prenom" => $user->prenom,
        "email" => $user->email,
        "numero" => $user->numero,
        "pays" => $user->code_pays,
        "ville" => $user->ville,
        "commune" => $user->commune,
        "promo1" => $user->promo1,
        "promo2" => $user->promo2,
        "universite" => $user->universite,
        "emploi" => $user->emploi,
      ];
    }

}

?>
