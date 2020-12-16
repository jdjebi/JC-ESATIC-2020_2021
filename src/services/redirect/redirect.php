<?php

class Redirect{
  static public function url($target){
    header("Location:$target");
    exit();
  }

  static public function route($name){
    Redirect::url(route($name));
  }

  static public function back(){
    Redirect::url(HTTP::previous_url());
  }

  static public function route_back($name){
    /* Redirige avec l'url de la page courante paramètre d'url*/
    $redirect_url = route($name)."?redirect=". $CURRENT_URL;
    Redirect::url($redirect_url);
  }
}

?>
