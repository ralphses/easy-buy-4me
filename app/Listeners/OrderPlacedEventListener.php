<?php

namespace App\Listeners;

use App\Events\OrderPlacedEvent;
use App\Models\whatsapp\Utils;
use App\Services\ResponseService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderPlacedEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderPlacedEvent $event): void
    {

        $responseService = new ResponseService(Utils::ADMIN_EVENTS, [
            'type' => Utils::ADMIN_USER_ORDER_NOTIFY,
            'customer' => $event->customer,
            'order' => $event->order,
            'method' => $event->paymentMethod
        ]);

        $responseService->processRequest();

        $responseService->sendResponse();
    }
}
