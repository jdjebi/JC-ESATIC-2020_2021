<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchUserIndex extends Model
{
    protected $table = "searchuserindex";

    protected $dates = [
        'updated_at',
    ];

    public function user(){
      return $this->belongsTo("App\User","users_id");
    }

    static function register($user){
      /* Assure la création d'une ligne d'index de recherche pour l'utilisateur */
      $index_row = new SearchUserIndex;
      $index_row->users_id = $user->id;
      $index_row->keywords = \SearchIndexTopLevelManager::creare_keywords_form_user_model($user);
      $index_row->save();
    }

    static function update_row($user){
      /* Assure la mise à jour de la ligne d'index de recherche d'un l'utilisateur */
      $index_row = SearchUserIndex::where('users_id', $user->id)->first();

      if(!is_null($index_row)){
        $index_row->keywords = \SearchIndexTopLevelManager::creare_keywords_form_user_model($user);
        $index_row->save();
      }
    }
}
