<?php

namespace App\Http\Controllers\UI\admin\Dev\Notifications;

use App\Http\Controllers\Controller;

class NotifController extends Controller
{

    public function create(){

        return view("admin.dev.notifications.index",[
            'title' => 'Dev - Notifications'
        ]);
    }

}
