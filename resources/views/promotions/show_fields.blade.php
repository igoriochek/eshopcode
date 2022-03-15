<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $promotion->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $promotion->description }}</p>
</div>

<!-- Start Field -->
<div class="col-sm-12">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $promotion->start }}</p>
</div>

<!-- Finish Field -->
<div class="col-sm-12">
    {!! Form::label('finish', 'Finish:') !!}
    <p>{{ $promotion->finish }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $promotion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $promotion->updated_at }}</p>
</div>

