<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use Illuminate\Http\Request;
use App\Notifications\AdminNotif;

class CreateNotificationController extends Controller
{

    public function basic(Request $request){

        $user = UserAuth();

        $user->notify(new AdminNotif($user));
       
        \Flash::add("Notification enregistrée");

        return redirect()->back();
    }


}
