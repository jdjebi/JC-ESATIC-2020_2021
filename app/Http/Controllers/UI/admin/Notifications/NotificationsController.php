<?php

namespace App\Http\Controllers\UI\admin\Notifications;

use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{

    public function show(){

        $unreadNotifications = UserAuth()->unreadNotifications;

        foreach($unreadNotifications as $n){
            $n->seen_at = now();
            $n->save();
          }

        return view("admin.pages.notifications",[
            'title' => 'Notifications'
        ]);
    }

}
