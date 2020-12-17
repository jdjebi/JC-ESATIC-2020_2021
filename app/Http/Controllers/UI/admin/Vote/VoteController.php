<?php

namespace App\Http\Controllers\UI\admin\Vote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Vote;
use App\Models\VoteControl;
use App\Models\Groupe;


class VoteController extends Controller
{
    public function index(Request $request){

        $gs =  Groupe::all();

        foreach ($gs as $key => $g) {
            $g->nbr_vote_public;
        }

        return view('admin.votes.index',[
            "groupes" => $gs,
            "v_status" => VoteControl::status()
        ]);
    }

    public function pdf(Request $request){
        return view('admin.votes.pdf');
    }

    public function toggle(Request $request){

        VoteControl::toggle();

        if(VoteControl::status()){
            \Flash::add("Activation");
        }else{
            \Flash::add("Désactivation");
        }

        return redirect()->back();
    }   

}

?>
