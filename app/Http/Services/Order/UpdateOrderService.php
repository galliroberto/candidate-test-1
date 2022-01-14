<?php

namespace App\Http\Services\Order;

use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order;

class UpdateOrderService
{
    public function execute(Order $order, UpdateOrderRequest $request): void
    {
        $order->update($request->all());
        $order->tags()->sync($request->get('tags'));
    }
}