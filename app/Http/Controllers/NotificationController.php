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
}
