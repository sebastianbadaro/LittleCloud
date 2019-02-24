<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationController extends Controller
{
    public function showNotificationApi()
    {
      $notifications = Notification::where('seen',false)->get();
      return $notifications->toJson();
    }

    public function readNotification(Notification $notification)
    {

      $notification->seen=1;
      $notification->save();

      return response($notification, 200)
                ->header('Content-Type', 'text/plain');
    }

    public function show()
    {
      // $notifications  = Notification::orderby('id','DESC');
      $notifications  = Notification::orderby('id','DESC')->get();
      // dd($notifications);
      return view('notifications.notifications',compact('notifications'));
    }
}
