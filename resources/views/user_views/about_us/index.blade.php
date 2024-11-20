@extends('layouts.app')

@section('title', __('menu.aboutUs'))

@section('content')
    <div class="about-banner different-bg-position section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('flash_messages')
                </div>
                <div class="col-lg-12">
                    <div class="about-banner-content text-center section-space-bottom-95">
                        <div class="section-title" style="text-align: justify;">
                            @if (app()->getLocale() == 'lt')
                            <p>UAB "Jodesta" – atestuota įmonė, įkurta 1997 metais, dirbanti energetikos sektoriuje. Įmonė atlieka įvairios paskirties išorės bei vidaus elektros inžinerinių tinklų projektavimo, montavimo bei remonto darbus. Taip pat vykdo elektros įrenginių techninę priežiūrą. Įmonėje dirba kompetentingi ir atestuoti vadovai bei aukštos kvalifikacijos specialistai, atliekantys projektavimo ir montavimo darbus.</p>
                            @elseif (app()->getLocale() == 'ru')
                            <p>UAB "Jodesta" is a certified company established in 1997, working in the energy sector. The company carries out design, installation and repair works of external and internal electrical engineering networks for various purposes. It also carries out technical maintenance of electrical equipment. The company employs competent and certified managers and highly qualified specialists for design and installation work.</p>
                            @else
                            <p>ЗАО «Йодеста» - сертифицированная компания, основанная в 1997 году и работающая в энергетическом секторе. Компания выполняет проектные, монтажные и ремонтные работы внешних и внутренних электротехнических сетей различного назначения. Также осуществляется техническое обслуживание электрооборудования. В компании работают компетентные и аттестованные менеджеры и высококвалифицированные специалисты для выполнения проектных и монтажных работ.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
