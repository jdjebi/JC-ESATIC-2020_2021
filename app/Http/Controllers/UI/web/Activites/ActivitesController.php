<?php

namespace App\Http\Controllers\UI\Web\Activites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ActivitesController extends Controller
{

    public function index(){

      $title =  "Activités";

      return view("app.activites.index2",[
        'title' => $title
      ]);
    }

}

?>