<?php

namespace App\View\Components;

use App\Models\Order;
use App\Models\whatsapp\Utils;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderInvoice extends Component
{
    /**
     * Create a new component instance.
     */

     public Order $order;
     public string $transactionStatus;
     public $orderedItems;
     public $orderStatus;

    public function __construct(Order $order, string $transactionStatus, $orderStatus, $orderedItems)
    {
        $this->order = $order;
        $this->transactionStatus = $transactionStatus;
        $this->orderedItems = $orderedItems;
        $this->orderStatus = $orderStatus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-invoice');
    }

    
}
