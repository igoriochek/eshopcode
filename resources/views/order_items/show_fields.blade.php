<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $orderItem->order_id }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $orderItem->product_id }}</p>
</div>

<!-- Price Current Field -->
<div class="col-sm-12">
    {!! Form::label('price_current', 'Price Current:') !!}
    <p>{{ $orderItem->price_current }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count', 'Count:') !!}
    <p>{{ $orderItem->count }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $orderItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $orderItem->updated_at }}</p>
</div>

