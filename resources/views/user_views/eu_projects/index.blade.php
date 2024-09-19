@extends('layouts.app')

@section('title', __('menu.euProjects'))

@section('content')
    <div class="about-banner different-bg-position section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('flash_messages')
                </div>
                <div class="col-lg-12">
                    <div class="about-banner-content text-center section-space-bottom-95">
                        <div class="section-title">
                            @if (App()->getLocale() == 'lt')
                                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" class="col-md-6 col-12">
                            @else
                                <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects"
                                    class="my-5 col-md-6 col-12">
                            @endif
                            <p class="short-desc mb-0" style="text-align: start;">
                                UAB "Jodesta" įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą
                                Nr. 13.1.1-LVPA-K-860-01-0168
                                „E. komercijos modelio diegimas UAB "Bilan". Bendra projekto vertė – <b>59
                                    930,00</b> Eur, iš kurių <b>44
                                    947,50</b> Eur sudaro Europos regioninės plėtros fondo lėšos.
                                <br>Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos
                                fondų investicijų veiksmų
                                programos 13 prioriteto "Veiksmų, skirtų COVID-19 pandemijos sukeltai krizei
                                įveikti, skatinimas ir
                                pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam ekonomikos
                                atsigavimui" Nr. 13.1.1-LVPA-K-860
                                "E. komercijos modelis COVID-19". Projektas yra finansuojamas Europos regioninės
                                plėtros fondo lėšomis.
                                Finansuojama kaip Europos Sąjungos atsako į COVID-19 pandemiją priemonė.
                                <br>UAB "Bilan" - įmonė, teikianti kokybiškas buhalterines ir teisines
                                paslaugas. Pagrindinės veiklos
                                sritys: buhalterinės, verslo ir teisės konsultacijų paslaugos, įmonių steigimas.
                                Vienos labiausiai
                                besiplečiančių įmonės paslaugų - tai finansinės apskaitos paslaugos.
                                <br>Iki šiol įmonė savo paslaugas pardavinėjo tik tiesioginiu būdu, tačiau
                                neturėdama galimybės valdyti
                                verslo sandorių el. būdu (t. y. vykdyti produktų užsakymus elektroninėse
                                prekybos platformoje), ribojo
                                potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą.
                                <br>Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir
                                efektyviau juos aptarnauti,
                                labiau išplėsti pardavimus, nusprendė skaitmenizuoti apskaitos paslaugų
                                pardavimo procesus ir pardavinėti
                                savo paslaugas naudojantis elektroninės komercijos sprendimais.
                                <br>Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos
                                platforma, panaudojant pažangiausias
                                informacines technologijas, suteikiančias naujas galimybes inovatyviam apskaitos
                                produktų pardavimui.
                                <br>Įgyvendintas projektas leis įmonei efektyviau pardavinėti savo produktus,
                                užtikrins greitesnį ir
                                kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo laikas leis
                                aptarnauti daugiau klientų, tai
                                užtikrins įmonės pajamų augimą.
                                <br>Projekto įgyvendinimo laikotarpis nuo 2022 m. kovo mėn. iki 2023 m. kovo
                                mėn.
                            </p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
