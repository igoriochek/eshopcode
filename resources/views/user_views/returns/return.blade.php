@extends('layouts.app')

@section('content')
<section class="section-shop padding-b-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-12 mb-24">
                <div class="bb-shop-pro-inner">
                    <div class="row mb-minus-24">
                        <div class="section-title bb-center">
                            <div class="section-detail" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="200">
                                <h2 class="bb-title">{{ __('names.return') }}</h2>
                            </div>
                        </div>
                        {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                        <div class="bb-contact-wrap" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" style="margin-bottom: 24px;">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null) !!}

                        </div>
                        <div class="bb-login-button d-flex" style="justify-content: space-between;" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <button type="submit" class="bb-btn-2">
                                {{ __('buttons.save') }}
                            </button>
                            <a href="{{ route('rootorders') }}" class="bb-btn-1">
                                {{ __('buttons.cancel') }}
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection