{!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'row']) !!}
<div class="col-lg-6 col-12">
    {!! Form::label('name', __('forms.name') )!!}
    {!! Form::text('name', $user->name) !!}
</div>
<div class="col-lg-6 col-12">
    {!! Form::label('email', __('forms.email')) !!}
    {!! Form::text('email', $user->email) !!}
</div>
<div class="col-lg-6 col-12">
    {!! Form::label('street', __('forms.street')) !!}
    {!! Form::text('street', $user->street) !!}
</div>
<div class="col">
    {!! Form::label('house_flat', __('forms.house_flat')) !!}
    {!! Form::text('house_flat', $user->house_flat) !!}
</div>
<div class="col">
    {!! Form::label('post_index', __('forms.post_index')) !!}
    {!! Form::text('post_index', $user->post_index) !!}
</div>
<div class="col-lg-6 col-12">
    {!! Form::label('city', __('forms.city')) !!}
    {!! Form::text('city', $user->city) !!}
</div>
<div class="col-lg-6 col-12">
    {!! Form::label('phone_number', __('forms.phone_number')) !!}
    {!! Form::text('phone_number', $user->phone_number) !!}
</div>
<div class="col-12">
    <div class="save_button primary_btn default_button">
        <button type="submit">{{ __('buttons.save') }}</button>
    </div>
</div>
{!! Form::close() !!}