<?php

namespace App\Services\Customer;

use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;

class UpdateCustomerService
{
    public function execute(Customer $customer, UpdateCustomerRequest $request): void
    {
        $customer->update($request->all());
    }
}