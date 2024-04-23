<?php

namespace App\Listeners;

use App\Models\Customer;
use App\Events\CustomerCreation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotyiFySalesOnCustomerCreation

{

    private Customer $customer;
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
     * @param  \App\Events\CustomerCreation  $event
     * @return void
     */
    public function handle(CustomerCreation $event)
    {
        $customer = $event->getCustomer();
        //   dd($customer);
    }
}
