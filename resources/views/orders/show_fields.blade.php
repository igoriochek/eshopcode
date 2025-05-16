<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('table.user') . ':') !!}
    <p>[{{ $order->user_id }}] {{ $order->user->name }}</p>
</div>

<!-- User Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('table.email') . ':') !!}
    <p class="text-font-size">{{ $order->user->email }}</p>
</div>

<!-- User Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', __('table.phone_number') . ':') !!}
    <p class="text-font-size">{{ $order->user->phone_number }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', __('table.status') . ':') !!}
    <p>{{ $order->status->name }}</p>
</div>

<!-- Company Purchase Field -->
<div class="col-sm-12">
    {!! Form::label('company_purchase', __('names.companyPurchase') . ':') !!}
    <p>{{ $order->company_purchase }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at') . ':') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at') . ':') !!}
    <p>{{ $order->updated_at }}</p>
</div>
