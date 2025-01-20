<!-- Code Field -->
<div class="col-sm-12">
    {!! Form::label('code', __('table.code').':') !!}
    <p class="text-font-size">{{ $discountCoupon->code }}</p>
</div>

<!-- Used Field -->
<div class="col-sm-12">
    {!! Form::label('used',  __('table.used').':') !!}
    <p class="text-font-size">{{ $discountCoupon->used }}</p>
</div>

<!-- Value Field -->
<div class="col-sm-12">
    {!! Form::label('value',  __('table.value').':') !!}
    <p class="text-font-size">{{ $discountCoupon->value }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at',  __('table.created_at').':') !!}
    <p class="text-font-size">{{ $discountCoupon->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at',  __('table.updated_at').':') !!}
    <p class="text-font-size">{{ $discountCoupon->updated_at }}</p>
</div>

