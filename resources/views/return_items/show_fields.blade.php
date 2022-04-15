<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>[{{ $returnItem->user_id }}] {{ $returnItem->user->name }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product:') !!}
    <p>{{ $returnItem->product->name }}</p>
</div>

<!-- Price Current Field -->
<div class="col-sm-12">
    {!! Form::label('price_current', 'Price Current:') !!}
    <p>{{ $returnItem->price_current }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count', 'Count:') !!}
    <p>{{ $returnItem->count }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $returnItem->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $returnItem->updated_at }}</p>
</div>

