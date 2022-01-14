<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Services\Order\StoreOrderService;
use App\Http\Services\Order\DeleteOrderService;
use App\Http\Services\Order\UpdateOrderService;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Tag;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index')
            ->withOrders(
                Order::with('tags')
                    ->with('customer')
                    ->with('contract')
                    ->paginate(10)
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create')
            ->withOrder(new Order)
            ->withCustomers(Customer::all())
            ->withTags(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderService $storeOrderService, StoreOrderRequest $request)
    {
        $order = $storeOrderService->execute($request);

        return redirect()->route('orders.edit', $order)->withMessage('Order created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'))
            ->withCustomers(Customer::all())
            ->withTags(Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order        $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderService $updateOrderService, UpdateOrderRequest $request, Order $order)
    {
        $updateOrderService->execute($order, $request);

        return redirect()->route('orders.edit', $order)->withMessage('Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteOrderService $deleteOrderService, Order $order)
    {
        $deleteOrderService->execute($order);

        return redirect()->route('orders.index')->withMessage('Order deleted successfully');
    }
}
