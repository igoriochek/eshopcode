{!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'row']) !!}
<div class="col-lg-6 col-12">
    <div class="input-item">
        {!! Form::label('name', __('forms.name') )!!}
        {!! Form::text('name', $user->name) !!}
    </div>
</div>
<div class="col-lg-6 col-12">
    <div class="input-item">
        {!! Form::label('email', __('forms.email')) !!}
        {!! Form::text('email', $user->email) !!}
    </div>
</div>
<div class="col-lg-6 col-12">
    <div class="input-item">
        {!! Form::label('street', __('forms.street')) !!}
        {!! Form::text('street', $user->street) !!}
    </div>
</div>
<div class="col">
    <div class="input-item">
        {!! Form::label('house_flat', __('forms.house_flat')) !!}
        {!! Form::text('house_flat', $user->house_flat) !!}
    </div>
</div>
<div class="col">
    <div class="input-item">
        {!! Form::label('post_index', __('forms.post_index')) !!}
        {!! Form::text('post_index', $user->post_index) !!}
    </div>
</div>
<div class="col-lg-6 col-12">
    <div class="input-item">
        {!! Form::label('city', __('forms.city')) !!}
        {!! Form::text('city', $user->city) !!}
    </div>
</div>
<div class="col-lg-6 col-12">
    <div class="input-item">
        {!! Form::label('phone_number', __('forms.phone_number')) !!}
        {!! Form::text('phone_number', $user->phone_number) !!}
    </div>
</div>
<div class="col-12">
    <div class="input-button">
        <button type="submit" class="bb-btn-2">{{ __('buttons.save') }}</button>
    </div>
</div>
{!! Form::close() !!}