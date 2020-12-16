<?php

namespace App\Http\Controllers\UI\admin\Posts;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;


class CreatePostController extends Controller
{

    public function menu(){
      return view("admin.pubs.menu");
    }


    public function libre(){
      return view("admin.pubs.editor.libre");
    }

}
