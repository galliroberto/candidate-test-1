<?php

namespace App\Http\Services\Order;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Models\Contract;
use App\Models\Order;

class StoreOrderService
{
    public function execute(StoreOrderRequest $request): Order {
        $order = Order::create($request->all());
        $order->tags()->sync($request->get('tags'));

        Contract::create([
            'customer_id' => $order->customer->id,
            'order_id' => $order->id
        ]);

        return $order;
    }
}