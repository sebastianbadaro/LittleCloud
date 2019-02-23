<?php

namespace App\Events;

use App\Sale;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class newSale
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $sale;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Sale $sale)
    {
        $this->sale=$sale;
    }

}
