<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('table.name').':') !!}
    <p class="text-font-size">{{ $promotion->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description',  __('table.description').':') !!}
    <p class="text-font-size">{{ $promotion->description }}</p>
</div>

<!-- Start Field -->
<div class="col-sm-12">
    {!! Form::label('start',  __('table.start').':') !!}
    <p class="text-font-size">{{ $promotion->start }}</p>
</div>

<!-- Finish Field -->
<div class="col-sm-12">
    {!! Form::label('finish',  __('table.finish').':') !!}
    <p class="text-font-size">{{ $promotion->finish }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p class="text-font-size">{{ $promotion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $promotion->updated_at }}</p>
</div>

