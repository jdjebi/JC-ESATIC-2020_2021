<?php

namespace App\Http\Controllers\UI\admin\Code;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RESAC\Core\Security\RolesFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;
use App\RESAC\Defines;

class CodeController extends Controller
{
    public function index(Request $request){
        $user = UserAuth();
        $basic_roles = RolesFactory::GetBasicRoles();

        $type_selected  = "";
        $users = [];

        if($request->filled("type")){

            $users = User::where("user_type",$request->type)->get();
            $type_selected = $request->type;   
           
            if($request->filled("n")){

                for ($i=0; $i < $request->n; $i++) { 

                    $u = 1;

                    while($u != 0){
                        if($type_selected == "parrain")
                            $login_code = create_parrain_jc_code(); 
                        else if($type_selected == "admin")
                            $login_code = create_admin_jc_code(); 
                        else if($type_selected == "juge")
                            $login_code = create_juge_jc_code();   
                        else
                            $login_code = create_jc_code();


                        $u = count(User::where("login_code",$login_code)->get());
                    }

                    $is_student = false;
                    $staff_role = null;

                    if($type_selected == "etudiant"){
                        $is_student = true;
                    }


                    $staff_role = RolesFactory::GetRoleByType($type_selected);
        
                    $user = User::create([
                        'prenom' => "",
                        'nom' => "auto-gen",
                        'login_code' => $login_code,
                        'staff_role' => $staff_role,
                        'user_type' => $type_selected,
                        'is_student'=> $is_student,
                        "password" => Hash::make("12345"),
                        "version" => Defines::CURRENT_UPDATE_VERSION,
                    ]);

                    SearchUserIndex::register($user);

                    $users = User::where("user_type",$request->type)->get();

                }
            }
        }

        

        return view("admin.codes.index",[
            'user' => $user,
            'users'  => $users,
            "type_selected" => $type_selected,
            'basic_roles' => $basic_roles,
          ]);
    }

    public function generate(){
        return "génération de codes";
    }

    public function verif(){
        return view("admin.codes.verif");
    }

    public function pdf(Request $request){

        $roles = RolesFactory::GetBasicRoles();

        $codes = [];

        foreach ($roles as $i => $role) {

            $types = $role["types"];

            foreach ($types as $j => $type) {
                $users = User::where("nom",'auto-gen')
                    ->where("user_type",$type)
                    ->get();


                $codes[] = [
                    "type" => $type['label'],
                    "data" => $users
                ];
            }
        }

        return view("admin.codes.pdf",[
            "codes" => $codes
        ]);
    }
}
