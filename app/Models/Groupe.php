<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vote;
use App\Models\User;


class Groupe extends Model 
{
    protected $table = "groupes";

    protected $fillable = ['*'];

    public function getNbrVotePublicAttribute()
    {
        $vs = Vote::where('groupe_id',$this->attributes['id'])->get();

        $t = 0;

        foreach ($vs as $key => $v) {
            $id = $v->user_id;
            $u = User::find($id);
            
            if($u){
                if($u->user_type != "parrain"){
                    $t++;
                }
            }
        }

        return $t;
    }

    public function getNbrVoteParrainAttribute()
    {
        $vs = Vote::where('groupe_id',$this->attributes['id'])->get();

        $t = 0;

        foreach ($vs as $key => $v) {
            $id = $v->user_id;
            $u = User::find($id);
            
            if($u){
                if($u->user_type == "parrain"){
                    $t++;
                }
            }
        }

        return $t;
    }

    static function GetTotalVotePublic()
    {
        $vs = Vote::all();

        $t = 0;

        foreach ($vs as $key => $v) {
            $id = $v->user_id;
            $u = User::find($id);
            
            if($u){
                if($u->user_type != "parrain"){
                    $t++;
                }
            }
        }

        if($t == 0)
            $t = 1;

        return $t;
    }

    static function GetTotalVoteParrain()
    {
        $vs = Vote::all();

        $t = 0;

        foreach ($vs as $key => $v) {
            $id = $v->user_id;
            $u = User::find($id);
            
            if($u){
                if($u->user_type == "parrain"){
                    $t++;
                }
            }
        }

        if($t == 0)
            $t = 1;

        return $t;
    }

}