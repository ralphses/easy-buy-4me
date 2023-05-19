<?php

namespace App\Services;

use App\Models\Errand;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\User;
use App\Models\Wallet;
use App\Models\whatsapp\Utils;
use DateTime;
use Nette\Utils\Random;

class OrderService
{

    public function findUserCurrentOrder(User $user)
    {

        $order = $user->orders->filter(function ($order) {


            $expiryTime = new DateTime($order->created_at);
            $expiryTime->modify("+40 minute");
            $now = new DateTime(now());

            return $order->status == Utils::ORDER_STATUS_PROCESSING and
                $expiryTime > $now;
        })->first();


        if (!$order) {

            $userCurrentOrders = $user->orders->filter(function ($order) {
                return $order->status === Utils::ORDER_STATUS_PROCESSING;
            })->all();

            foreach ($userCurrentOrders as $o) {
                $o->status = Utils::ORDER_STATUS_CANCELLED;
                $o->save();
            }

            $order = Order::create([
                'order_id' => Random::generate(10),
                'description' => "",
                'total_amount' => 0.0,
                'status' => Utils::ORDER_STATUS_PROCESSING,
                'user_id' => $user->id
            ]);

            return $order;
        }

        return $order;
    }

    public function addOrderedItem(Order $order, string $itemId, $vendorId): Order
    {
        $item = Item::where(['id' => $itemId, 'vendor_id' => $vendorId])->first();

        if ($item) {

            $existingItem = false;
            //Update orderedItem quantity if it exist
            $thisOrderedItem = $order->orderedItems->filter(function ($orderedItem) use ($item) {
                return $orderedItem->item_id == $item->id;
            })->first();

            if ($thisOrderedItem) {

                $thisOrderedItem->quantity = $thisOrderedItem->quantity + 1;
                $thisOrderedItem->save();
            } else {
                $thisOrderedItem = OrderedItem::create([
                    'item_id' => $item->id,
                    'quantity' => 1,
                    'order_id' => $order->id
                ]);
            }

            //Build order description
            $description = "";

            foreach (OrderedItem::where('order_id', $order->id)->get() as $orI) {
                $i = Item::find($orI->item_id);
                $description = $description . "$i->item_name - N$i->item_price per $i->unit_name ($orI->quantity$i->unit_name)\n";
            }

            $order->description = $description;
            $order->total_amount = $order->total_amount + ($item->item_price * $thisOrderedItem->quantity);

            $order->save();

            return $order;
        }
    }

    public function getPreviousOrder(User $user)
    {
        $userOrder = $user->orders->filter(function ($order) {
            return $order->status == Utils::ORDER_STATUS_PROCESSING;
        })->sortBy(function ($order) {
            return $order->created_at;
        })
            ->first();

        return $userOrder;
    }

    public function cancelOrder($orderId)
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->status = Utils::ORDER_STATUS_CANCELLED;
            $order->save();
        }
    }

    public function performCheckout($orderId, $walletId)
    {

        $order = Order::find($orderId);
        $user = $order->user;

        $errand = Errand::where('order_id', $orderId)->first();

        if (!$errand and $order) {


            if ($walletId == "all") {

                $totalWalletBalance = $user->wallets->reduce(function ($initial, $wallet) {
                    return $initial + $wallet->balance;
                }, 0);

                if ($totalWalletBalance > $order->total_amount) {

                    //Create a new Errand
                    $errand = Errand::create([
                        'destination_phone' => $user->phone,
                        'dispatcher' => "",
                        'status' => Utils::ORDER_STATUS_INITIATED,
                        'order_id' => $order->id
                    ]);

                    $order->status = Utils::ORDER_STATUS_INITIATED;
                    $order->save();

                    return $errand;
                }

                return false;
            } else {
                $wallet = Wallet::find($walletId);
                if ($wallet and $wallet->balance > $order->total_amount) {

                    //Create a new Errand
                    $errand = Errand::create([
                        'destination_phone' => $user->phone,
                        'dispatcher' => "",
                        'status' => Utils::ORDER_STATUS_INITIATED,
                        'order_id' => $order->id
                    ]);

                    $order->status = Utils::ORDER_STATUS_INITIATED;
                    $order->save();
                    
                    return $errand;
                }

                return false;
            }

            return false;
        }

        return $errand;
    }
}
