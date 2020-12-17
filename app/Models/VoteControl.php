<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteControl extends Model 
{
    protected $table = "votecontrol";

    static function toggle(){
        $v = VoteControl::find(1);

        if($v->active)
            $v->active = 0;
        else
            $v->active = 1;
        
        $v->save();
    }

    static function status(){
        return VoteControl::find(1)->active;
    }

}