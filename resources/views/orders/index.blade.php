@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-md-10 col-md-2">
            <a href="{{ route('orders.create') }}" class="btn btn-primary btn-block">+ New Order</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Contract</th>
                    <th scope="col" colspan="2" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->customer->full_name ?? '-' }}</td>
                        <td>{{ $order->tags->pluck('name')->toJson() }}</td>
                        <td><a target="_blank" href="{{ route('contracts.edit', $order->contract ?? 0) }}">Contract</a></td>
                        <td>
                            <a href="{{ route('orders.edit', $order) }}">[Edit]</a>
                            <a href="#"
                               onclick="event.preventDefault(); if(confirm('Do you want to cancel this order now?')) document.getElementById('delete-order-{{ $order->id }}-form').submit();">[Delete]</a>
                            <form id="delete-order-{{ $order->id }}-form" action="{{ route('orders.destroy', $order) }}"
                                  method="POST" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $orders->links() }}
        </div>
    </div>

@stop
