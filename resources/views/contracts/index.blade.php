@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Order</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contracts as $contract)
                    <tr>
                        <th scope="row">{{ $contract->id }}</th>
                        <td>#{{ $contract->customer_id }} | {{ $contract->customer->full_name ?? '-' }}</td>
                        <td>#{{ $contract->order_id }} | {{ $contract->order->title ?? '-' }}</td>
                        <td><a href="{{ route('contracts.edit', $contract) }}">[Edit]</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{ $contracts->links() }}
        </div>
    </div>

@stop
