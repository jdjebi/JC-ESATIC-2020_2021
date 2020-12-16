<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use Illuminate\Http\Request;
use App\Notifications\AdminNotif;
use App\Models\Notification;

class StatusNotificationController extends Controller
{

    public function mark_as_read(Request $request, $uuid){

        $notification = Notification::findOrFail($uuid);
        $notification->update(["read_at"=>now(),"seen_at"=>now()]);
        
        $notification->save();

        \Flash::add("Notification marquée");

        return redirect()->back();
    }

    public function delete(Request $request, $uuid){

        \Flash::add("Notification supprimée");

        return redirect()->back();
    }

}
