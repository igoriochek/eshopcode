<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{$cookie->name}}</p>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{$cookie->description}}</p>
</div>

<!-- Is Cookie Mandatory Field -->
<div class="form-group col-sm-12">
    {!! Form::label('isMandatory', 'Mandatory Status:') !!}
    <p>{{$cookie->isMandatory}}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cookie->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $cookie->updated_at }}</p>
</div>

