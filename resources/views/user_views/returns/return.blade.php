@extends('layouts.app')

@section('content')
<div class="my-account pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @include('flash::message')
                    <hr class="my-4" />
                    <h3 class="contact-page-title">[{{ __('names.return') }}]</h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                {!! Form::label('description', 'Description:') !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary' , 'style' => 'padding: 13px 30px; height: 51px; border-radius: 5px; text-transform: capitalize;']) !!}
                        <a href="{{ route('rootorders') }}" class="btn btn-dark3" style="padding: 13px 30px;">{{__('buttons.cancel')}}</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .th-col {
        background-color: #0090f0 !important;
        border-color: transparent !important;
        color: #fff !important;
        text-transform: capitalize !important;
    }

    .form-control {
        height: 40px;
        font-size: 1.5rem;
    }
</style>
@endpush
