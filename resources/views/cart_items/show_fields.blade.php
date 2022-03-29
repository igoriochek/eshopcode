<!-- Cart Id Field -->
<div class="col-sm-12">
    {!! Form::label('cart_id', 'Cart Id:') !!}
    <p>{{ $cartItem->cart_id }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{{ $cartItem->product_id }}</p>
</div>

<!-- Price Current Field -->
<div class="col-sm-12">
    {!! Form::label('price_current', 'Price Current:') !!}
    <p>{{ $cartItem->price_current }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cartItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cartItem->updated_at }}</p>
</div>

