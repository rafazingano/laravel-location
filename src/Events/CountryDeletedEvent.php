<?php

namespace ConfrariaWeb\Location\Events;

use ConfrariaWeb\Location\Historics\CountryDeletedHistoric;
use ConfrariaWeb\Location\Models\Country;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CountryDeletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $obj;
    public $historic;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Country $country)
    {
        $this->obj = $country;
        $this->historic = new CountryDeletedHistoric($country);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
