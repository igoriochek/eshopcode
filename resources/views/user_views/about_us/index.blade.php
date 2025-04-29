@extends('layouts.app')

@section('title', __('menu.aboutUs'))

@section('content')
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12 mb-24">
                    <div class="bb-about-contact">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('menu.aboutUs') }}</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            @if (app()->getLocale() == 'lt')
                                <p>
                                    UAB “Madeiva” yra maitinimo paslaugas teikianti įmonė.
                                </p>
                            @elseif (app()->getLocale() == 'ru')
                                <p>
                                    UAB “Madeiva” — компания, предоставляющая услуги общественного питания.
                                </p>
                            @else
                                <p>
                                    UAB “Madeiva” is a company providing catering services.
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
