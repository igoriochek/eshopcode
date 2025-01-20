<!-- Cart Id Field -->
<div class="col-sm-12">
    {!! Form::label('cart_id', __('table.cartId').':') !!}
    <p class="text-font-size">{{ $cartItem->cart_id }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', __('table.productId').':') !!}
    <p class="text-font-size">{{ $cartItem->product_id }}</p>
</div>

<!-- Price Current Field -->
<div class="col-sm-12">
    {!! Form::label('price_current',  __('table.priceCurrent').':') !!}
    <p class="text-font-size">{{ $cartItem->price_current }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p class="text-font-size">{{ $cartItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $cartItem->updated_at }}</p>
</div>

