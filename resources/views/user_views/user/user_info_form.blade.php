{!! Form::model($user, ['route' => ['userprofilesave'], 'method' => 'patch', 'class' => 'row']) !!}
    <div class="form-group col-lg-6">
        {!! Form::label('name', __('forms.name') )!!}
        {!! Form::text('name', $user->name, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group col-lg-6">
        {!! Form::label('email', __('forms.email')) !!}
        {!! Form::text('email', $user->email, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group col-lg-6">
        {!! Form::label('street', __('forms.street')) !!}
        {!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3 col-6">
        {!! Form::label('house_flat', __('forms.house_flat')) !!}
        {!! Form::text('house_flat', $user->house_flat, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-3 col-6">
        {!! Form::label('post_index', __('forms.post_index')) !!}
        {!! Form::text('post_index', $user->post_index, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-lg-6">
        {!! Form::label('city', __('forms.city')) !!}
        {!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-lg-6">
        {!! Form::label('phone_number', __('forms.phone_number')) !!}
        {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group mb--40 col-lg-6">
        <input type="submit" class="axil-btn" value="{{ __('buttons.save') }}" data-loading-text="Loading...">
    </div>
{!! Form::close() !!}