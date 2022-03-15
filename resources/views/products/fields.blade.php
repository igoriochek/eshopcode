<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video:') !!}
    {!! Form::text('video', null, ['class' => 'form-control']) !!}
</div>

<!-- Visible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visible', 'Visible:') !!}
    {!! Form::select('visible', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Promotion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('promotion_id', 'Promotion Id:') !!}
    {!! Form::select('promotion_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Discount Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount_id', 'Discount Id:') !!}
    {!! Form::select('discount_id', [], null, ['class' => 'form-control custom-select']) !!}
</div>
