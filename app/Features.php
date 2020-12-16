<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $table = 'new_features';

    public $timestamps = false;

    protected $fillable = ['title','content','user_author_id'];

    public function author(){
      return $this->belongsTo("App\User","user_author_id");
    }

    public function get_form_created_at(){
      $date = date_create($this->attributes['created_at']);
      return date_format($date,"Y-m-d");
    }

    public function get_sm_created_at(){
      setlocale(LC_TIME, "fr_FR");
      return strftime("%d %B %G", strtotime($this->attributes["created_at"]));
    }


    /* Repo */

    static function get_all(){
      return Features::orderBy('created_at','desc')->get();
    }

    static function last(){
      return Features::orderBy('created_at','desc')->first();
    }
}
