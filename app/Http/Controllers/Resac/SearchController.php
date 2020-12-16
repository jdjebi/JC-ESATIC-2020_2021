<?php

namespace App\Http\Controllers\Resac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;

use App\Features;

class SearchController extends Controller
{
  public function admin(Request $request){

    $search_query = "";
    $results = [];

    if($request->has("q")){
      $search_query = $request->q;
      $results = \Search::user_with_TopLevelEngine($search_query);
    }else{
      \Flash::add("Veuillez renseigner le nom de l'utilisateur à rechercher.",'warning');
    }

    $user = Auth2::user();

    $title = "Rechercher: ".$search_query;

    return view("admin.search",[
      "search_query" => $search_query,
      "title" => $title,
      "user" => $user,
      "results" => $results
    ]);

  }

  public function user_for_app(Request $request){
    $search_query = "";
    $results = [];

    if($request->has("q")){
      if($request->filled("q")){
        $search_query = $request->q;
        $results = \Search::user_with_TopLevelEngine($search_query);
      }
    }

    $user = Auth2::user();

    $last_feature = Features::last();

    $title = "Rechercher: ".$search_query;

    return view("app.feed.search",[
      "search_query" => $search_query,
      "title" => $title,
      "user" => $user,
      "results" => $results,
      "last_feature" => $last_feature
    ]);
  }
}
