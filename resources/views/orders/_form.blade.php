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
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $order->title) }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Cost</label>
            <input type="number" step=0.01 name="cost" class="form-control" value="{{ old('cost', $order->cost) }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $order->description) }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tags</label>
            <select name="tags[]" multiple class="form-control">
                @foreach($tags ?? [] as $tag)
                    <option value="{{ $tag->id }}" {{ $order->tags->contains($tag->id) ? 'selected':'' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Customer</label>
            <select name="customer_id" class="form-control">
                @foreach($customers ?? [] as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id', $order->customer_id) == $customer->id ? 'selected':'' }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
