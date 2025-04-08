<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('table.user').':') !!}
    <p class="text-font-size">[{{ $order->user_id }}] {{ $order->user->name }}</p>
</div>

<!-- User Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('table.email').':') !!}
    <p class="text-font-size">{{ $order->user->email }}</p>
</div>
 
<!-- User Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', __('table.phone_number').':') !!}
    <p class="text-font-size">{{ $order->user->phone_number }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id',  __('table.status').':') !!}
    <p class="text-font-size">{{ $order->status->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p class="text-font-size">{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $order->updated_at }}</p>
</div>

