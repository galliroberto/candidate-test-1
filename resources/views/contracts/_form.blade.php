@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Customer</label>
            <input readonly type="text" name="customer_id" class="form-control" value="{{ old('customer_id', $contract->customer_id) }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Order</label>
            <input readonly type="text" name="order_id" class="form-control" value="{{ old('order_id', $contract->order_id) }}">
        </div>
    </div>
</div>
