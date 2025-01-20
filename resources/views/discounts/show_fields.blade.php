<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('table.name').':') !!}
    <p class="text-font-size">{{ $discount->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description',  __('table.description').':') !!}
    <p class="text-font-size">{{ $discount->description }}</p>
</div>

<!-- Proc Field -->
<div class="col-sm-12">
    {!! Form::label('proc',  __('table.proc').':') !!}
    <p class="text-font-size">{{ $discount->proc }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p class="text-font-size">{{ $discount->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $discount->updated_at }}</p>
</div>

