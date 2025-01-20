<div class="col-sm-12">
    {!! Form::label('name', __('forms.name')).":" !!}
    <p class="text-font-size">{{ $customer->name }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('email', __('forms.email')).":" !!}
    <p class="text-font-size">{{ $customer->email }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('street', __('forms.street')).":" !!}
    <p class="text-font-size">{{ $customer->street }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('house_flat', __('forms.house_flat')).":" !!}
    <p class="text-font-size">{{ $customer->house_flat }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('post_index', __('forms.post_index')).":" !!}
    <p class="text-font-size">{{ $customer->post_index }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('city', __('forms.city')).":" !!}
    <p class="text-font-size">{{ $customer->city }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('usertype', __('forms.usertype')).":" !!}
    <p class="text-font-size">{{ $customer->type == 1 ? __("forms.admin") : __("forms.user") }}</p>
</div>
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at')).":" !!}
    <p class="text-font-size">{{ $customer->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at')).":" !!}
    <p class="text-font-size">{{ $customer->updated_at }}</p>
</div>
