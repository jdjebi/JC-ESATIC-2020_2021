<?php

namespace App\Http\Controllers\UI\admin\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Resac\Auth2;

class AuthController extends Controller
{
    public function login(){
      $title2 = "Connexion";
      return view('admin.login',[
        "title2" => $title2
      ]);
    }
}

?>
