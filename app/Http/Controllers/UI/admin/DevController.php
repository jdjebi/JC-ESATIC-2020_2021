<?php

namespace App\Http\Controllers\UI\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;

class DevController extends Controller
{
    public function create_flash(Request $request){

      $user = Auth2::user();

      if($request->filled('create')){

        \Flash::add("Notification de test.","info",true);

        return redirect()->route('admin.dev.create_flash');

      }

      if($request->filled('clear')){

        \Flash::clear();

      }

      return view("admin.flash.creator",[
        'user' => $user,
      ]);

    }


}
