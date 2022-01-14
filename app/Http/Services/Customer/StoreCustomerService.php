<?php

namespace App\Http\Services\Customer;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Models\Contract;
use App\Models\Customer;

class StoreCustomerService
{
    public function execute(StoreCustomerRequest $request): Customer {
        return Customer::create($request->all());
    }
}