<?php

namespace App\Events;

use App\Models\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CustomerCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private Customer $customer;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->setCustomer($customer);
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

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }
    public function getCustomer(): Customer
    {
        return  $this->customer;
    }
}
