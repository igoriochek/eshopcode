<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $order->user_id }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{{ $order->status_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $order->updated_at }}</p>
</div>

