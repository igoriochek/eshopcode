{!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'row']) !!}
    <div class="row">
        <div class="col-xxl-6 col-md-6">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('name', $user->name, ['class' => "ps-4"]) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('name', __('forms.name') )!!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('email', $user->email, ['class' => "ps-4"]) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('email', __('forms.email')) !!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('street', $user->street, ['class' => 'ps-4']) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('street', __('forms.street')) !!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('house_flat', $user->house_flat, ['class' => 'ps-4']) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('house_flat', __('forms.house_flat')) !!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('post_index', $user->post_index, ['class' => 'ps-4']) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('post_index', __('forms.post_index')) !!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('city', $user->city, ['class' => 'ps-4']) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('city', __('forms.city')) !!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="tp-profile-input-box">
                <div class="tp-contact-input">
                    {!! Form::text('phone_number', $user->phone_number, ['class' => 'ps-4']) !!}
                </div>
                <div class="tp-profile-input-title">
                    {!! Form::label('phone_number', __('forms.phone_number')) !!}
                 </div>
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="profile__btn">
                <button type="submit" class="tp-btn">
                    {{ __('buttons.save') }}
                </button>
            </div>
        </div>
    </div>
{!! Form::close() !!}