{!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'myaccount-form']) !!}
<div class="myaccount-form-inner">
    <div class="single-input">
        {!! Form::label('name', __('forms.name')) !!}
        {!! Form::text('name', $user->name, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input">
        {!! Form::label('email', __('forms.email')) !!}
        {!! Form::text('email', $user->email, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input">
        {!! Form::label('street', __('forms.street')) !!}
        {!! Form::text('street', $user->street, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input single-input-half">
        {!! Form::label('house_flat', __('forms.house_flat')) !!}
        {!! Form::text('house_flat', $user->house_flat, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input single-input-half">
        {!! Form::label('post_index', __('forms.post_index')) !!}
        {!! Form::text('post_index', $user->post_index, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input">
        {!! Form::label('city', __('forms.city')) !!}
        {!! Form::text('city', $user->city, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input">
        {!! Form::label('phone_number', __('forms.phone_number')) !!}
        {!! Form::text('phone_number', $user->phone_number, ['class' => 'ps-4']) !!}
    </div>
    <div class="single-input">
        <button class="btn btn-custom-size lg-size btn-primary" type="submit">
            <span> {{ __('buttons.save') }} </span>
        </button>
    </div>
</div>
{!! Form::close() !!}
