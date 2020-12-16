<?php

namespace App\Http\Controllers\Backend\User\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
 
    public function update(Request $request){

        $user = UserAuth();

        if(($request->has("change_pass"))){
            $FormPass = new \Form\User\Update\Password($_POST);
            if($FormPass->is_validate()){         
                $data = $FormPass->get_data();
                $password = $data["pass"];
                if(Hash::check($password, $user->password)){
                    if($data['nw_pass'] == $data['conf_pass']){
                        $user->password = Hash::make($data['nw_pass']);
                        $user->save();
                        \Flash::add("Mot de passe mis à jour.","success");
                    }else{
                      $FormPass->add_error('global',"Les mots de passe sont différents.");
                    }
                }else{
                    $FormPass->add_error('global',"Mot de passe du compte incorrecte.");
                }
            }
            session()->put('form_export', $FormPass->export_results());
        }
     
        return redirect()->back();
    }
 
}

?>
