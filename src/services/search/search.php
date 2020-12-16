<?php

use App\User;
use App\Models\SearchUserIndex;

class Search{

  static function user_with_TopLevelEngine($search_query){
    /* Effectue la recherche d'utilisateur à partir de l'index de recherche */
    $users = [];
    $index_rows = SearchUserIndex::where('keywords', 'LIKE','%' .$search_query. '%')->get();
    foreach ($index_rows as $row) {
      $users[] = User::find($row->users_id);
    }
    return $users;
  }

}

class SearchIndexTopLevelManager{

  public static function generate_user_index(){
    /* Génère l'index du moteur de cherche en produidant une ligne d'index par utilisateur */
    $users = User::all();
    foreach ($users as $user) {
      $index_row = new SearchUserIndex;
      $index_row->users_id = $user->id;
      $index_row->keywords = SearchIndexTopLevelManager::creare_keywords_form_user_model($user);
      $index_row->save();
    }
  }

  public static function creare_keywords_form_user_model($user){
    /* Créé les mots clés pour la ligne de l'index de recherche de l'utilisateur */
    $name = $user->nom;
    $surname = $user->prenom;
    $fullname = $user->fullname;
    $fullname_inverse = $surname.' '.$name;
    $keywords = implode(";", [$name,$surname,$fullname,$fullname_inverse]);
    return $keywords;
  }

}

?>
