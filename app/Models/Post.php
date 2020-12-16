<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ["user","content","validate","user_id","status","validate_status"];
    protected $text_plain = "";

    // Constantes d'état d'une publication
    const BROUILLON = 0;
    const PUBLIE = 1;
    const TERMINE = 2;

    // Constantes d'état de validation
    const NEUTRE = 3;
    const EN_ATTENTE = 2;
    const ACCEPTE = 1;
    const CERTIFIE = 1;
    const REFUSE = 0;

    public function user(){
      return $this->belongsTo("App\User","user");
    }

    public function certificate_author(){
      return $this->belongsTo("App\User","validate_by");
    }

    public function user_object(){
      return $this->belongsTo("App\User","user");
    }

    public function getValidateStatusTagAttribute(){
      $validate_status = $this->attributes['validate_status'];
      if($validate_status == 0)
        return 'danger'; 
      elseif($validate_status == 1)
        return 'success';
      elseif($validate_status == 2)
        return 'warning'; 
      else 
        return 'muted';
    }

    public function getValidateStatusTitleAttribute(){
      $validate_status = $this->attributes['validate_status'];
      if($validate_status == 0)
        return 'Publication non approuvée'; 
      elseif($validate_status == 1)
        return 'Publication approuvée';
      elseif($validate_status == 2)
        return 'Publication en attente de validation'; 
      else 
        return 'Publication neutre';
    }

}
