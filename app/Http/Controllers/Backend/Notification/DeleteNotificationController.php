<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use Illuminate\Http\Request;
use App\Notifications\AdminNotif;

class DeleteNotificationController extends Controller
{

    public function basic(Request $request){

        $user = UserAuth();

        $user->notifications()->delete();
               
        \Flash::add("Toute les notifications ont été supprimée");

        return redirect()->back();
    }


}
