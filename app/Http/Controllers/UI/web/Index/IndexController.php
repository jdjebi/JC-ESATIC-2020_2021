<?php

namespace App\Http\Controllers\UI\Web\Index;

use App\Http\Controllers\Controller;
use App\User;
use App\Features;


class IndexController extends Controller
{

    public function __invoke()
    {
      return redirect()->route("home");
    }

    public function index()
    {
      $title2 = "Accueil";
      
      return view('app.index.page2',[
        "title2" => $title2
      ]);
    }

    public function index2()
    {
      return view('app.index.page');
    }

}

?>
