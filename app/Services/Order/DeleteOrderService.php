<?php

namespace App\Services\Order;

use App\Models\Order;
use Carbon\Carbon;

class DeleteOrderService
{
    public function execute(Order $order): void
    {
        $order->delete();
    }
}