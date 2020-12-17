<?php

namespace App\Http\Controllers\Backend\Vote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Vote;
use App\Models\Groupe;


class VoteController extends Controller
{
    public function voter(Request $request){

        $error = false;
        $message = "";
        $g = null;

        if($request->filled("id_groupe")){
            $g = Groupe::find($request->id_groupe);
            if($g){
                $vote = Vote::create([
                    "user_id" => UserAuth()->id,
                    "groupe_id" => $request->id_groupe
                ]);
            }else{
                $message = "Groupe inexistant";
                $error = true;
            }
        }else{
            $message = "Demande vote incorrecte";
            $error = true;
        }
        
        return [
            "error" => $error,
            "message" => $message,
            "groupe" => $g
        ];
    }

}

?>
