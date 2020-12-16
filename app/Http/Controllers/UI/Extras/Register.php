<?php

namespace App\Http\Controllers\UI\Extras;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function __invoke(){
        return view('app.extras.register_wellcome');
    }
}
