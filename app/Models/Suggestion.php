<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model 
{
    protected $table = "suggestion";

    protected $fillable = ['content', 'note', 'etat', 'created_at'];

    public function user(){
        return $this->belongsTo("App\User","user");
    }
  
    public function user_object(){
        return $this->belongsTo("App\User","user");
    }
}