<?php

namespace App\Http\Controllers\UI\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;
use App\Models\SearchUserIndex;

class WebEngineIndexController extends Controller
{
    public function show(){

      $user = Auth2::user();

      $indew_rows = SearchUserIndex::all();

      $title = "Mot de recherche: Index";

      return view("admin.webengine.show_index",[
        "title" => $title,
        "user" => $user,
        "index_rows" => $indew_rows
      ]);
    }

    public function clear_index(){

      SearchUserIndex::truncate();

      \Flash::add("Index de recherche vidé.","info");
      return redirect()->route("admin.webengine.show");
    }

    public function generate_index(){
      /* S'assurer que le l'index est vide */

      \SearchIndexTopLevelManager::generate_user_index();

      \Flash::add("Index de recherche généré.","info");
      return redirect()->route("admin.webengine.show");
    }
}
