@extends('layouts.app')

@section('content')
    @include('user_views.section', ['title' => __('menu.aboutUs') ])
    <div class="container">
        <div class="p-4 mb-4" style="line-height: 35px; font-size: 1.1rem">
            <div class="d-flex pb-5">
                @if ($lang === 'lt')
                    <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="500" />
                @else
                    <img src="{{ asset('images/es_projektai_en_ru.jpeg') }}" alt="es_projektai_en_ru" width="500" class="my-3" />
                @endif
            </div>
{{--            @if ($lang == 'lt')--}}
                <p class="mb-4">
                    <span class="me-5"></span>
                    UAB „Viatora“ įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą Nr. 13.1.1-LVPA-K-860-01-0184 „E. komercijos modelio diegimas UAB " Viatora“. Bendra projekto vertė – <b>59 930,00</b> Eur, iš kurių <b>44 947,50</b> Eur sudaro Europos regioninės plėtros fondo lėšos.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos fondų investicijų veiksmų programos 13 prioriteto „Veiksmų, skirtų COVID-19 pandemijos sukeltai krizei įveikti, skatinimas ir pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam ekonomikos atsigavimui“ Nr. 13.1.1-LVPA-K-860 „E. komercijos modelis COVID-19“. Projektas yra finansuojamas Europos regioninės plėtros fondo lėšomis. Finansuojama kaip Europos Sąjungos atsako į COVID-19 pandemiją priemonė.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    UAB "Viatora" įmonė  siūlanti visas su kelionėmis susijusias paslaugas. Įmonė taip pat formuoja originalius, individualius kelionių pasiūlymus pagal kiekvieno kliento poreikius bei teikia draudimo, vizų paslaugas. Viena iš įmonės paslaugų -  apgyvendinimo su augintiniais paslauga.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Iki šiol įmonė savo turizmo produktus pardavinėjo tik tiesioginiu būdu, tačiau neturėdama galimybės valdyti verslo sandorių el. būdu (t.y. vykdyti produktų užsakymus elektroninėse prekybos platformoje), ribojo potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, labiau išplėsti pardavimus, nusprendė skaitmenizuoti pardavimo procesus ir pardavinėti savo produktus - nuosavas apgyvendinimo su augintiniais paslaugas - naudojantis elektroninės komercijos sprendimais.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos platforma, panaudojant pažangiausias informacines technologijas, suteikiančias naujas galimybes inovatyviam produktų pardavimui.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Įgyvendintas projektas leis įmonei efektyviau pardavinėti savo produktus, užtikrins greitesnį ir kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo laikas leis aptarnauti daugiau klientų, tai užtikrins įmonės pajamų augimą.
                </p>
                <p class="mb-4">
                    <span class="me-5"></span>
                    Projekto įgyvendinimo laikotarpis nuo 2022 m. vasario mėn. iki 2023 m. vasario mėn.
                </p>
{{--            @endif--}}
        </div>
    </div>
@endsection
