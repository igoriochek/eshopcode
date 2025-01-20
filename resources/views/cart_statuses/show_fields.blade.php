<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('table.name').':') !!}
    <p class="text-font-size">{{ $cartStatus->name }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at').':') !!}
    <p class="text-font-size">{{ $cartStatus->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $cartStatus->updated_at }}</p>
</div>

