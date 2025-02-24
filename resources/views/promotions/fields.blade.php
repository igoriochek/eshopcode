{{--<!-- Name Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--    {!! Form::label('name',  __('table.name').':') !!}--}}
{{--    {!! Form::text('name', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Description Field -->--}}
{{--<div class="form-group col-sm-12 col-lg-12">--}}
{{--    {!! Form::label('description', __('table.description').':') !!}--}}
{{--    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

@foreach (config('translatable.locales') as $locale)
    <div class="form-group col-sm-6">
        {!! Form::label("name_$locale", ''.__('table.name').' '.$locale.':') !!}
        {!! Form::text("name_$locale", ( isset($promotion) && isset($promotion->translate($locale)->name) ? $promotion->translate($locale)->name : null ) , ['class' => 'form-control']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label("description_$locale", ''.__('table.description').' '.$locale.':') !!}
        {!! Form::textarea("description_$locale",  ( isset($promotion) && isset($promotion->translate($locale)->description) ? $promotion->translate($locale)->description : null ), ['class' => 'form-control']) !!}
    </div>
@endforeach

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start',  __('table.start').':') !!}
    {!! Form::text('start', null, ['class' => 'form-control']) !!}
</div>

<!-- Finish Field -->
<div class="form-group col-sm-6">
    {!! Form::label('finish',  __('table.finish').':') !!}
    {!! Form::text('finish', null, ['class' => 'form-control']) !!}
</div>

<style>
.form-control {
    font-size: 1.4rem;
    height: 34px;
}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
  width: auto !important;
  height: auto !important;
  cursor: pointer !important;
  border-radius: 0% !important;
  border: 1px solid #c5dbec !important;
  background: #dfeffc !important;
  font-weight: bold !important;
  color: #2e6e9e !important;
}

.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
  border: 1px solid #79b7e7 !important;
  background: #f5f8f9 !important;
  font-weight: bold !important;
  color: #e17009 !important;
}

.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
  border: 1px solid #fad42e !important;
  background: #fbec88 !important;
  color: #363636 !important;
}
</style>