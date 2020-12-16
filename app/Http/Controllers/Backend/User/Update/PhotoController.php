<?php

namespace App\Http\Controllers\Backend\User\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
 
    public function update(Request $request){

        $user = UserAuth();

        $success = true;

        $data = $this->get_image_data_from_base64($request->input("base64-photo"));

        $path = $user->id .'.png';

        // Si on est en production on utilise Dropbox
        if(env('APP_ENV') == "web"){
            Storage::disk('dropbox')->put($path, $data);
        }
        // sinon on utilise le stockage local
        else{
            Storage::disk('local')->put("public/".$path, $data);
        }

        $user->photo = $path;
        $user->save();

        if(($request->has("change_pass"))){
            session()->put('form_export', $FormPass->export_results());
        }

        return json_encode([
            "success" => $success,
            "photo" => asset($path)
        ]);
     
    }

    public function api_delete(Request $request){
        $user = UserAuth();
        $user->photo = null;
        $user->save();
        return json_encode([
            "photo" => asset(config('var.user_default_photo'))
        ]);
    }

    public function get_image_data_from_base64($img_base64_data){
        $image_array_1 = explode(";", $img_base64_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        return base64_decode($image_array_2[1]);
    }

    
 
}

?>

