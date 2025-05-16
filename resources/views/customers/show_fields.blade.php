<div class="col-sm-12">
    {!! Form::label('name', __('forms.name')) . ':' !!}
    <p>{{ $customer->name }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('email', __('forms.email')) . ':' !!}
    <p>{{ $customer->email }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('street', __('forms.street')) . ':' !!}
    <p>{{ $customer->street }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('house_flat', __('forms.house_flat')) . ':' !!}
    <p>{{ $customer->house_flat }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('post_index', __('forms.post_index')) . ':' !!}
    <p>{{ $customer->post_index }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('city', __('forms.city')) . ':' !!}
    <p>{{ $customer->city }}</p>
</div>

<!-- Company Title Field -->
<div class="col-sm-12">
    {!! Form::label('company_title', __('forms.title') . ':') !!}
    <p>{{ $customer->company->title ?? '' }}</p>
</div>

<!-- Company Code Field -->
<div class="col-sm-12">
    {!! Form::label('company_code', __('footer.companycode') . ':') !!}
    <p>{{ $customer->company->code ?? '' }}</p>
</div>

<!-- Company VAT Field -->
<div class="col-sm-12">
    {!! Form::label('company_title', __('footer.vatcode') . ':') !!}
    <p>{{ $customer->company->vat ?? '' }}</p>
</div>

<!-- Company Address Field -->
<div class="col-sm-12">
    {!! Form::label('company_address', __('footer.address') . ':') !!}
    <p>{{ $customer->company->address ?? '' }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('usertype', __('forms.usertype')) . ':' !!}
    <p>{{ $customer->type == 1 ? __('forms.admin') : __('forms.user') }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('created_at', __('table.created_at')) . ':' !!}
    <p>{{ $customer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('table.updated_at')) . ':' !!}
    <p>{{ $customer->updated_at }}</p>
</div>
