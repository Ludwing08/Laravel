<?php

namespace App\Listeners;

use App\Events\CreateOrderEvent;
use App\Models\Invoices;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateInvoiceListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(CreateOrderEvent $event)
    {
        //
        Invoices::create([
            "order_id" => $event->order->id,
            "total_amount" => $event->order->total_amount
        ]);
    }
}
