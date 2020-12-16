<?php

namespace App\Http\Controllers\UI\Web\Actu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Features;
use App\Resac\Core\Posts\PostRenderer;

class ActuController extends Controller
{

    public function index(){


      $last_feature = Features::last();

      $title =  "Actualités";

      return view("app.actu",[
        'title' => $title,
        'last_feature' => $last_feature
      ]);
    }

}

?>