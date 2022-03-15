<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $product->price }}</p>
</div>

<!-- Count Field -->
<div class="col-sm-12">
    {!! Form::label('count', 'Count:') !!}
    <p>{{ $product->count }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $product->image }}</p>
</div>

<!-- Video Field -->
<div class="col-sm-12">
    {!! Form::label('video', 'Video:') !!}
    <p>{{ $product->video }}</p>
</div>

<!-- Visible Field -->
<div class="col-sm-12">
    {!! Form::label('visible', 'Visible:') !!}
    <p>{{ $product->visible }}</p>
</div>

<!-- Promotion Id Field -->
<div class="col-sm-12">
    {!! Form::label('promotion_id', 'Promotion Id:') !!}
    <p>{{ $product->promotion_id }}</p>
</div>

<!-- Discount Id Field -->
<div class="col-sm-12">
    {!! Form::label('discount_id', 'Discount Id:') !!}
    <p>{{ $product->discount_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

