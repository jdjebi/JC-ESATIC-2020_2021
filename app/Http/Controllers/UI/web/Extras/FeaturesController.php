<?php

namespace App\Http\Controllers\UI\Web\Extras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Features;
use Resac\Auth2;

class FeaturesController extends Controller
{
  public function __invoke()
  {
      $user = Auth2::user();

      $features = Features::get_all();

      $title2 = "Nouveautés";

      return view('app.news.timeline',[
        'user' => $user,
        'features' => $features,
        'title2' => $title2,
      ]);
  }
}

?>
