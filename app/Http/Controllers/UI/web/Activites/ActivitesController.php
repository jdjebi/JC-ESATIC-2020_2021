<?php

namespace App\Http\Controllers\UI\Web\Activites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Groupe;
use App\Models\Vote;



class ActivitesController extends Controller
{

    public function index(){

      $title =  "Activités";

      $groupes = Groupe::all();

      $groupe_vote = null;
      $vote_already_done = 0;

      $vote = Vote::where("user_id",UserAuth()->id)->get()->first();

      if($vote){
        $groupe_vote = Groupe::find($vote->groupe_id);
        $vote_already_done = 1;
      }

      return view("app.activites.index2",[
        'title' => $title,
        'groupes' => $groupes,
        'groupe_vote' => $groupe_vote,
        'vote_already_done' => $vote_already_done
      ]);
    }

}

?>