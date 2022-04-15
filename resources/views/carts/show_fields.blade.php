<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>[{{ $cart->user_id }}] {{ $cart->user->name }}</p>
</div>

<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $cart->code }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', 'Status:') !!}
    <p>{{ $cart->status->name }}</p>
</div>

<!-- Admin Id Field -->
<div class="col-sm-12">
    {!! Form::label('admin_id', 'Admin:') !!}
    <p>[{{ $cart->admin_id }}] {{ $cart->admin->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cart->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cart->updated_at }}</p>
</div>

