<?php

namespace App\Http\Services\Customer;

use App\Models\Customer;

class DeleteCustomerService
{
    public function execute(Customer $customer): void
    {
        $customer->delete();
    }
}