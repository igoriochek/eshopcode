<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('table.user').':') !!}
    <p class="text-font-size">[{{ $returns->user_id }}] {{ $returns->user->name }}</p>
</div>

<!-- Admin Id Field -->
<div class="col-sm-12">
    {!! Form::label('admin_id', __('table.admin').':') !!}
    <p class="text-font-size">[{{ $returns->admin_id }}] {{ $returns->admin->name }}</p>
</div>

<!-- Order Id Field -->
<div class="col-sm-12">
    {!! Form::label('order_id', __('table.orderId').':') !!}
    <p class="text-font-size">{{ $returns->order_id }}</p>
</div>

<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', __('table.code').':') !!}
    <p class="text-font-size">{{ $returns->code }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('table.description').':') !!}
    <p class="text-font-size">{{ $returns->description }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', __('table.status').':') !!}
    <p class="text-font-size">{{ $returns->status->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at').':') !!}
    <p class="text-font-size">{{ $returns->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $returns->updated_at }}</p>
</div>

