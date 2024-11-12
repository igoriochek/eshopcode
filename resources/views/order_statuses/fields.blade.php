<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name',  __('table.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<style>
.form-control {
    font-size: 1.4rem;
    height: 34px;
}
</style>