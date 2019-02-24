<?php

namespace App\Listener;

use App\Notification;
use App\Events\newSale;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationForCeroStock
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  newSale  $event
     * @return void
     */
    public function handle(newSale $event)
    {
        foreach ($event->sale->products as $product) {

          if ($product->stock<1) {
          $notification = new Notification();
          $notification->description='Vendiste el ultimo '.$product->description.' codigo '.$product->code.' en stock.';
          $notification->seen=0;
          $notification->save();
          }

        }

    }
}
