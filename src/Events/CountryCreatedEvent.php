<?php

namespace ConfrariaWeb\Location\Events;

use ConfrariaWeb\Location\Historics\CountryCreatedHistoric;
use ConfrariaWeb\Location\Models\Country;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CountryCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $obj;
    public $historic;

    /**
     * Create a new event instance.
     *
     * @param Country $country
     */
    public function __construct(Country $country)
    {
        $this->obj = $country;
        $this->historic = new CountryCreatedHistoric($country);
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
