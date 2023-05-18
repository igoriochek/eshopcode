<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('table.user') . ':') !!}
    <p>[{{ $order->user_id }}] {{ $order->user->name }}</p>
</div>

<!-- Status Id Field -->
<div class="col-sm-12">
    {!! Form::label('status_id', __('table.status') . ':') !!}
    <p>{{ $order->status->name }}</p>
</div>

<!-- Collect Time Field -->
<div class="col-sm-12">
    {!! Form::label('collect_time', __('table.collectTime') . ':') !!}
    <p>{{ $order->collect_time }}</p>
</div>

<!-- Eat Location Field -->
<div class="col-sm-12">
    {!! Form::label('place', __('names.eatLocation') . ':') !!}
    <p>{{ $order->place == '1' ? __('names.onTheSpot') : __('names.takeaway') }}</p>
</div>

<!-- IsCompanyBuying Field -->
<div class="col-sm-12">
    {!! Form::label('isCompanyBuying', __('names.companyBuy') . ':') !!}
    <p>{{ $order->isCompanyBuying ? __('names.yes') : __('names.no') }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at') . ':') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at') . ':') !!}
    <p>{{ $order->updated_at }}</p>
</div>

@if ($order->isCompanyBuying)
    <!-- Company Name Field -->
    <div class="col-sm-12 mt-4">
        {!! Form::label('company_name', __('forms.companyName') . ':') !!}
        <p>{{ $company->name }}</p>
    </div>
    <!-- Company Address Field -->
    <div class="col-sm-12">
        {!! Form::label('company_address', __('forms.companyAddress') . ':') !!}
        <p>{{ $company->address }}</p>
    </div>
    <!-- Company Code Field -->
    <div class="col-sm-12">
        {!! Form::label('company_code', __('forms.companyCode') . ':') !!}
        <p>{{ $company->code }}</p>
    </div>
    <!-- Company VAT Code Field -->
    <div class="col-sm-12">
        {!! Form::label('company_vat_code', __('forms.companyVatCode') . ':') !!}
        <p>{{ $company->vat_code ?? '-' }}</p>
    </div>
@endif
