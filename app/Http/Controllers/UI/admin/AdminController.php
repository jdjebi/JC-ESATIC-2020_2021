<?php

namespace App\Http\Controllers\UI\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Resac\Auth2;

class AdminController extends Controller
{

    public function login(){

      $title2 = "Connexion";

      return view('admin.login',[
        "title2" => $title2
      ]);

    }

    public function index(){

      $user = Auth2::user();

      $title2 = "Gestion des utilisateurs";

      return view("admin.index",[
        "user" => $user,
        "title2" => $title2
      ]);
    }

    public function user_manager(){

      $user = Auth2::user();

      $title = "Gestion des utilisateurs";

      return view("admin.manager_user",[
        "user" => $user,
        "title" => $title
      ]);
    }

    public function user_profil($user_id){

      $user = Auth2::user();
      $user_visited = User::find($user_id);

      if(!$user_visited){
        return view('admin.user.profil_404',[
          "user" => $user,
          "title" => "Utilisateur introuvable"
        ]);
      }else{

        $form = new \UserAdminSettingsForm($_POST);

        $form->set_default([
          "role" => $user_visited->staff_role_code
        ]);

        $form->register_array('role',['admin','member']);

        if($form->is_validate()){
          $data = $form->get_data();

          if($data['role'] == "admin"){
            $user_visited->is_staff = 1;
          }else{
            $user_visited->is_staff = 0;
          }

          $user_visited->staff_role = $data['role'];
          $user_visited->save();

          \Flash::add("Paramètres de l'utilisateur mis à jour.","success");
        }else{
          if(isset($form->errors['required'])){
            \Flash::add("Veuiller renseigner tous les champs.","danger");
          }

          if($form->isset('selects','role')){
            \Flash::add("Veuiller renseigner un rôle valide.","danger");
          }
        }

        $title =  $user_visited->nom.' '.$user_visited->prenom;

        return view('admin.user.profil',[
          "form" => $form,
          "title" => $title,
          "user" => $user,
          'user_visited' => $user_visited
        ]);
      }

    }

    public function delete_user(){

      if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $user = \Users::get($id);
        if($user){
          // $user->delete();
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

      if(\RESAC\Auth2::is_admin_logged()){
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

    public function api_get_user_list(){

      // Clé de sécurité
      $user_connected = Auth2::user();

      $users_tmp = User::all();
      
      $users = [];
  
      foreach ($users_tmp as $user) {
  
        $users[] = [
          'id' => $user->id,
          'nom' => $user->nom,
          'prenom' => $user->prenom,
          'promo' => $user->promo,
          'universite' => $user->universite,
          'emploi' => $user->emploi,
          'pays' => $user->pays,
          'role' => $user->staff_role,
          'photo' => photos_cdn_asset($user),
          'version' => $user->version, 
          'profil_url' => route('profil')."?id=".$user->id,
          'admin_profil_url' => route('admin_user_profil',['user_id' => $user->id])
        ];
      }

      return json_encode($users);
    }

}

?>
