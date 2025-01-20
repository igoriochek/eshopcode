<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('table.user').':') !!}
    <p class="text-font-size">[{{ $cart->user_id }}] {{ $cart->user->name }}</p>
</div>

<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code',  __('table.code').':') !!}
    <p class="text-font-size">{{ $cart->code }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id',  __('table.status').':') !!}
    <p class="text-font-size">{{ $cart->status->name }}</p>
</div>

<!-- Admin Id Field -->
<div class="col-sm-12">
    {!! Form::label('admin_id',  __('table.admin').':') !!}
    <p class="text-font-size">[{{ $cart->admin_id }}] {{ $cart->admin->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p class="text-font-size">{{ $cart->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $cart->updated_at }}</p>
</div>

