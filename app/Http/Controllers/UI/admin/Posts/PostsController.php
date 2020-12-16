<?php

namespace App\Http\Controllers\UI\admin\Posts;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;


class PostsController extends Controller
{

    public function dashboard(){
      return view("admin.pubs.dashboard");
    }

    public function my_posts(){
      return view("admin.pubs.my_posts");
    }


    public function pub($id){

      $user = Auth2::user();

      $post = Post::findOrFail($id);

      return view('admin.pubs.pub',[
        "user" => $user,
        "post" => $post
      ]);

    }

    public function validate_pub($id){

      $post = \Post::get2($id);
      $param_error = "Paramètres de l'opération incorrecte.";

      if($post){
        if (!isset($_GET['action'])) {
          \Flash::add($param_error,"danger");
        }else{
          $user = Auth2::user();
          // Certification de la publication
          if($_GET["action"] == "validate"){
            \Post::certificate($id,$user->id);
            \Flash::add("Publication certifiée.","success");
          }elseif($_GET["action"] == "cancel"){
            \Post::cancel_certificate($id,$user->id);
            \Flash::add("Certification de la publication annulée.","success");
          }else{
            \Flash::add($param_error,"danger");
          }
        }
      }
      return redirect()->route("admin.manage_pub",$id);
    }

    public function api_get_all(){
      // Middleware
      $pubs =  \Post::all2();
      return json_encode($pubs);
    }


}
