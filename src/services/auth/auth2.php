<?php

namespace Resac;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


function authenticate($email_username,$password){
  /*
    Cette fonction vérifie si un utilisateur peut capable de se connecter.
  */

  $user = null;

  if (\Illuminate\Support\Facades\Auth::attempt(['email' => $email_username, 'password' => $password])) {
    $user = \App\User::where('email', $email_username)->first();
  }else if(\Illuminate\Support\Facades\Auth::attempt(['username' => $email_username, 'password' => $password])){
    $user = \App\User::where('username', $email_username)->first();
  }

  return $user;

}

function login($request,$user){
  /*
    Assure la connexion de l'utilisateur
  */

  # Connexion Effective avec Laravel
  \Illuminate\Support\Facades\Auth::login($user,true);

  account_update($request,$user);

}

function logout(){
  \Illuminate\Support\Facades\Auth::logout();
}

function account_update($request,$user){
  /*
    Assure la mise à jour du compte de l'utilisateur
  */

  $account_version = $user->version;

  if($account_version < 2){
    # Migration du hashage du mot de passe sha1 vers un hashage sh256 géré par Laravel
    $user->password = Hash::make($request->password);
    $user->version = 2;
    $user->save();
  }

  if($account_version < 3){
    # Ajout du rôle si l'utilisateur n'a pas de rôle
    $roles = $user->getRoleNames();
    if(count($roles) == 0){
      $user->assignRole("member");
    }
    $user->version = 3;
    $user->save();
  }
}

class Auth2{

  static function check(){
    return \Illuminate\Support\Facades\Auth::check();
  }

  static function is_admin_logged(){
    if(\Illuminate\Support\Facades\Auth::check() && Auth2::is_admin()){
      return 1;
    }else{
      return 0;
    }
  }

  static function is_admin(){
    return \Illuminate\Support\Facades\Auth::user()->is_staff;
  }

  static function user(){
    return \Illuminate\Support\Facades\Auth::user();
  }

}


?>
