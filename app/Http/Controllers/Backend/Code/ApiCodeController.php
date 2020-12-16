<?php

namespace App\Http\Controllers\Backend\Code;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use Illuminate\Http\Request;
use App\Notifications\AdminNotif;
use App\Models\User;
use App\RESAC\Core\Security\RolesFactory;

class ApiCodeController extends Controller
{

    public function get(Request $request){

        $data = "";

        if($request->filled("code")){
            $data = [
                "error" => false,
                "message" => "ok"
            ];
            
            $user = User::where("login_code",$request->code)->get()->first();

            if($user){

                $data = [
                    "error" => false,
                    "user" => [
                        "code" => $user->login_code,
                        "role" => $user->staff_role,
                        "type" => RolesFactory::GetLabel($user->user_type),
                        "login_code_used" => $user->login_code_used
                    ]
                ]; 
            }else{
                $data = [
                    "error" => true,
                    "message" => "Code inconnue"
                ];
            }
        }else{
            $data = [
                "error" => true,
                "message" => "Aucun code saisi"
            ];
        }

        return response()->json($data);
        
    }


}
