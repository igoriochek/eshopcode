<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    <p>[{{ $returns->user_id }}] {{ $returns->user->name }}</p>
</div>

<!-- Admin Id Field -->
<div class="col-sm-12">
    {!! Form::label('admin_id', 'Admin:') !!}
    <p>[{{ $returns->admin_id }}] {{ $returns->admin->name }}</p>
</div>

<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', 'Order Id:') !!}
    <p>{{ $returns->order_id }}</p>
</div>

<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', 'Code:') !!}
    <p>{{ $returns->code }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $returns->description }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', 'Status:') !!}
    <p>{{ $returns->status->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $returns->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $returns->updated_at }}</p>
</div>

