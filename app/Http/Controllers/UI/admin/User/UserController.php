<?php

namespace App\Http\Controllers\UI\admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Resac\Auth2;
use App\RESAC\Core\Security\RolesFactory;

class UserController extends Controller
{

  public function index(){
    $title = "Gestion des utilisateurs";
    return view("admin.user.manage",[
      "title" => $title
    ]);
  }

  public function show($id){

    $user = Auth2::user();
    $user_visited = User::findOrFail($id);

    $title =  $user_visited->nom.' '.$user_visited->prenom;

    return view('admin.user.profil',[
      "title" => $title,
      "user" => $user,
      'user_visited' => $user_visited
    ]);

  }

  public function delete_user(){

    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $user = \Users::get($id);
      if($user){
        $user->delete();
        \Flash::add('Utilisateur supprimé.','success');
      }else{
        \Flash::add('Utilisateur introuvable.','danger');
      }
    }else{
      \Flash::add("Désolé une erreur c'est produite.",'danger');
    }

    if(isset($_GET['redirect'])){
      $redirect = $_GET['redirect'];
      return redirect($redirect);
    }

    return redirect()->back();
  }

  public function api_login(Request $request){

    // guest middleware

    if(\Auth::is_admin_logged()){
      return "";
    }

    $form = new \LoginForm($_POST);
    $success = false;

    if($form->is_validate()){
      $email = $form->get("email");
      $password = $form->get("password");

      $user = \Resac\authenticate($email,$password);

      if($user){
        if($user->is_staff){
          $success = true;
            \Resac\login($request,$user);
        }else{
          $form->add_error('global',"Connexion impossible.");
        }
      }else{
        $form->add_error('global',"Adresse E-mail ou mot de passe incorrecte.");
      }
    }else{
      $form->add_error('global',"Veuillez remplir tous les champs.");
    }

    return json_encode([
      'is_error' => $form->is_errors(),
      'errors' => $form->get_errors(),
      'success' => $success
    ]);

  }

  public function account(Request $request, $id){

    $user = User::find($id);

    $form = new \Form\User\Update\UserGeneralForm($_POST);

    $form->set_default([
      "nom" => $user->nom,
      "prenom" => $user->prenom,
      "email" => $user->email,
      "username" => $user->username,
    ]);

    $errors = null;

    // Récupération des erreurs issues du traitement Backend
    if(session("form_export")){
      $form->import_data(session("form_export"));
      session()->put("form_export",null);
      $errors = $form->get_errors();
    }

    $user = User::findOrFail($id);

    $title =  'Compte';

    $basic_roles = RolesFactory::GetBasicRoles();

    
    return view("admin.user.account.page",[
      'user' => $user,
      'title' => $title,
      'basic_roles' => $basic_roles,
      "form" => $form,
    ]);

  }

}

?>
