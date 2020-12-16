<?php

use Illuminate\Support\Facades\Http;


if(!function_exists("redirect")){
  function redirect($target){
    header("Location:$target");
    exit();
  }
}

if(!function_exists("session")){
  function session($key){
    return $_SESSION[$key];
  }
}


function crypt_password($password){
  return sha1($password);
}

function exist($val){
  return isset($val) && !empty($val);
}

function get_val_exist($key){
  return exist($_GET[$key]);
}

if(!function_exists("route")){
  function dump($data){
    echo "<pre style='background-color: #2e2e2e; color: #4CAF50; font-weight: 900;'>";
    var_dump($data);
    echo "</pre>";
  }
}

if(!function_exists("is_current_url")){
  function is_current_url($route_name, $active='active'){

    #echo Route::currentRouteName();
    #echo ' '.route($route_name);
    #echo ' '.url()->full();

    return url()->full() == route($route_name) ? $active : '';
  }
}

if(!function_exists("photos_cdn_asset")){
  function photos_cdn_asset($user){

    $url = asset($user->photo);

    if(env('APP_ENV') == "web"){
      try {
        $url = Storage::disk('dropbox')->url($path);
      } catch (Exception $e) {}
    }

    return $url;
  }  
}

if(!function_exists("countryflags_cdn")){
  function countryflags_cdn($flag_code, $size=32){
    /*
      Retourne le lien vers l'image du drapeau correspondant code au code spécifié
    */

    $url = "";

    if(env('APP_ENV') == "web"){
      $url = "https://www.countryflags.io/{$flag_code}/shiny/{$size}.png";
    }

    return $url;
  }  
}

if(!function_exists("html_countryflags")){
  function html_countryflags($flag_code, $size=32){
    /*
      Retourne le lien vers l'image du drapeau correspondant code au code spécifié
    */

    $url = "";

    $url = countryflags_cdn($flag_code,$size);     

    return "<img src=\"{$url}\" alt=\"\"> ";
  }  
}

if(!function_exists("UserAuth")){
  function UserAuth(){
    /*
      Retourne l'instance du l'utilisateur connecté. Si aucun alors on retourne nul
    */   

    return Resac\Auth2::user();
  }  
}


if(!function_exists("local_asset")){
  function local_asset($path){
    /*
      Retourne lien vers la ressource stocké sur le serveur local
    */   


    $url = asset("asset/{$path}");

    return $url;
  }
}

if(!function_exists("cdn_asset")){
  function cdn_asset($path,$version=1){
    /*
      Retourne lien vers la ressource stocké sur le serveur CDN à partir de path
      - Si $path commence par asset, alors asset sera retiré
    */   

    $url = "";
    $use_cdn = config("cdn.use_cdn");
    $cdn_host = config("cdn.cdn_host"); 

    // Retire asset/ au début de $path
    $path = preg_replace("#^asset/(.+)#","$1",$path);

    if($use_cdn){
      $url = "{$cdn_host}/{$path}";
    }else{
      $url = local_asset($path);
    }

    return $url;
    
  }  
}


if(!function_exists("web_asset")){
  function web_asset($path,$web_url,$version=1){
    /*
      Retourne lien vers la ressource stocké sur le serveur CDN ou sur l'url précisée dans $web_url
    */   

    if(env('APP_ENV') == "web"){
      $url = $web_url;
    }else{
      $url = cdn_asset($path,$version);
    }

    return $url;
    
  }  
}

if(!function_exists("web_local_asset")){
  function web_local_asset($path,$web_url,$version=1){
    /*
      Retourne lien vers la ressource stocké sur le serveur local ou sur l'url précisée dans $web_url
    */   

    if(env('APP_ENV') == "web"){
      $url = $web_url;
    }else{
      $url = local_asset($path,$version);
    }

    return $url;
    
  }  
}

function rand_str($str,$n){
  $c = "";
  for ($i=0; $i < $n; $i++) { 
    $c .= $str[rand(0, strlen($str)-1)];
  }
  return $c;
}


if(!function_exists("create_jc_code")){
  function create_jc_code(){

    $letters = "BCDEFGHIJKLMNOPQRSTUVWYZ";
    $number = "0123456789";

    $c1 =  rand_str($letters,2);
    $c2 =  rand_str($letters,1);
    $c3 =  rand_str($number,3);

    return "JC-$c1-$c2".$c3;
  }
}

if(!function_exists("create_staff_jc_code")){
  function create_staff_jc_code(){

    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $number = "0123456789";

    $c2 =  'A';
    $c3 =  rand_str($number,3);

    return "JC-00-$c2".$c3;
  }
}

if(!function_exists("create_admin_jc_code")){
  function create_admin_jc_code(){

    $letters = "ABCDEFGHIJKLMNOQRSTUVWXYZ"; //AXP exclut
    $number = "0123456789";

    $c2 =  'X';
    $c3 =  rand_str($number,3);

    return "JC-$c2".$c3;
  }
}

if(!function_exists("create_parrain_jc_code")){
  function create_parrain_jc_code(){

    $number = "0123456789";

    $c2 =  'P';
    $c3 =  rand_str($number,2);

    return "JC-$c2".$c3;
  }
}

if(!function_exists("create_juge_jc_code")){
  function create_juge_jc_code(){

    $number = "0123456789";

    $c2 =  'J';
    $c3 =  rand_str($number,2);

    return "JC-$c2".$c3;
  }
}

?>