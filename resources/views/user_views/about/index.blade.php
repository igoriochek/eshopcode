@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ __('menu.about') }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ __('menu.about') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <div class="container">
        <div class="p-5 my-5" style="border: 1px solid #ddd; border-radius: 5px">
            @if (app()->getLocale() == 'lt')
                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projekts" width="600">
            @else
                <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" width="550">
            @endif
            <span class="mt-5 pt-5"></span>
            <p><span class="ms-5 ps-2"></span>UAB „Lanosus“ įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą Nr. 13.1.1-LVPA-K-860-01-0442 „E. komercijos modelio diegimas UAB „Lanosus“. Bendra projekto vertė – 59 930,00 Eur, iš kurių 44 947,50 Eur sudaro Europos regioninės plėtros fondo lėšos.</p>
            <p><span class="ms-5 ps-2"></span>Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos fondų investicijų veiksmų programos 13 prioriteto „Veiksmų, skirtų COVID-19 pandemijos sukeltai krizei įveikti, skatinimas ir pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam ekonomikos atsigavimui“ Nr. 13.1.1-LVPA-K-860 „E. komercijos modelis COVID-19“. Projektas yra finansuojamas Europos regioninės plėtros fondo lėšomis. Finansuojama kaip Europos Sąjungos atsako į COVID-19 pandemiją priemonė.</p>
            <p><span class="ms-5 ps-2"></span>UAB „Lanosus“ – tai metalo formavimo įrangos ir staklių gamybos, bei šių staklių aptarnavimo ir  techninio palaikymo paslaugas teikianti įmonė.</p>
            <p><span class="ms-5 ps-2"></span>Įmonė siekia pardavinėti aukščiausios kokybės gaminius bei pasiūlyti sprendimus, apimančius įvairaus dydžio projektus, vienas labiausiai populiarėjančių įmonės produktų – tai savo sukurtų staklių gamyba.</p>
            <p><span class="ms-5 ps-2"></span>Iki šiol įmonė savo produktus pardavinėjo tik tiesioginiu būdu, tačiau neturėdama galimybės valdyti verslo sandorių el. būdu (t.y. vykdyti produktų užsakymus elektroninėse prekybos platformoje), ribojo potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą.</p>
            <p><span class="ms-5 ps-2"></span>Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, labiau išplėsti pardavimus, nusprendė skaitmenizuoti pardavimo procesus ir pardavinėti savo produktus naudojantis elektroninės komercijos sprendimais.</p>
            <p><span class="ms-5 ps-2"></span>Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos platforma, panaudojant pažangiausias informacines technologijas, suteikiančias naujas galimybes inovatyviam produktų pardavimui.</p>
            <p><span class="ms-5 ps-2"></span>Įgyvendintas projektas leis įmonei efektyviau pardavinėti savo produktus, užtikrins greitesnį ir kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo laikas leis aptarnauti daugiau klientų, tai užtikrins įmonės pajamų augimą.</p>
            <p><span class="ms-5 ps-2"></span>Projekto įgyvendinimo laikotarpis nuo 2022 m. vasario mėn. iki 2023 m. vasario mėn.</p>
        </div>
    </div>
@endsection
