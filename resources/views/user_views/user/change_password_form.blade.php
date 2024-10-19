{!! Form::model($user, ['route' => ['changePassword'], 'method' => 'post', 'class' => 'row']) !!}
<div class="row">
   <div class="col-xxl-12">
      <div class="input-group mb-3">
         <div class="tp-profile-input-title">
            {!! Form::label('current_password', __('forms.current_password') )!!}
         </div>
         <div class="tp-contact-input">
            {!! Form::password('current_password', ['class' => "form-control"]) !!}
         </div>
      </div>
   </div>
   <div class="col-xxl-6 col-md-6">
      <div class="input-group mb-3">
         <div class="tp-profile-input-title">
            {!! Form::label('new_password', __('forms.new_password')) !!}
         </div>
         <div class="tp-profile-input">
            {!! Form::password('new_password', ['class' => "form-control"]) !!}
         </div>
      </div>
   </div>
   <div class="col-xxl-6 col-md-6">
      <div class="input-group mb-3">
         <div class="tp-profile-input-title">
            {!! Form::label('new_password_confirmation', __('forms.confirm_password')) !!}
         </div>
         <div class="tp-profile-input">
            {!! Form::password('new_password_confirmation', ['class' => "form-control"]) !!}
         </div>
      </div>
   </div>
   <div class="col-xxl-6 col-md-6">
      <div class="profile__btn">
         <button type="submit" class="btn btn-primary">
            {{ __('buttons.save') }}
         </button>
      </div>
   </div>
</div>
{!! Form::close() !!}

<style>
   .input-group {
      display: flex;
      flex-direction: column;
   }
</style>