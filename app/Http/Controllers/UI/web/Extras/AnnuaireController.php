<?php

namespace App\Http\Controllers\UI\Web\Extras;

use App\Http\Controllers\Controller;
use App\User;

use Resac\Auth2;

class AnnuaireController extends Controller
{

    public function __invoke()
    {
      $user =  Auth2::user();

      $users = [];

      foreach (User::all() as $u) {
        $users[] = [
          "id" => $u->id,
          "photo" => photos_cdn_asset($u),
          "nom" => $u->nom,
          "prenom" => $u->prenom,
          "emploi" => (empty($u->emploi)) ? "Lycée Classique d'Abidjan" : $u->emploi,
          "universite" => (empty($u->universite)) ? "Etudiant" : $u->universite,
          "email" => $u->email,
          "promo" => (empty($u->promo1) ? "xxxx-xxxx" : $u->promo1.'-'.$u->promo2),
          "pays" => \Country::get($u->pays),
          "ville" => $u->ville,
          "profil_url" => route('profil.visitor',$u->id),
          "drapeau" => html_countryflags($u->code_pays,24)
        ];
      };

      $users_json = json_encode($users);

      $title2 = "Annuaire";

      return view('app.explorer.annuaire',[
        'user' => $user,
        'title2' =>  $title2,
        'users_json' => $users_json
      ]);

    }
}

?>
