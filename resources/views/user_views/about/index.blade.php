@extends('layouts.app')

@section('content')
    <div class="page-navigation">
        <div class="container">
            <a href="{{ url('/') }}">
                {{ __('menu.home') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <span>
                {{ __('menu.euProjects') ?? '' }}
            </span>
        </div>
    </div>
    <div class="container">
        <div class="product-section p-4">
            <h3 class="mb-4">{{ __('menu.euProjects') }}</h3>
            @if (App()->getLocale() == 'lt')
                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" class="col-md-6 col-12">
            @else
                <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" class="my-5 col-md-6 col-12">
            @endif
            <p><span class="ms-4"></span>IĮ „E. Mikucko firma“ įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą Nr. 13.1.1-LVPA-K-860-01-0456 „E. komercijos modelio diegimas IĮ „E. Mikucko firma“. Bendra projekto vertė – 59 930,00 Eur, iš kurių 44 947,50 Eur sudaro Europos regioninės plėtros fondo lėšos.</p>
            <p><span class="ms-4"></span>Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos fondų investicijų veiksmų programos 13 prioriteto „Veiksmų, skirtų COVID-19 pandemijos sukeltai krizei įveikti, skatinimas ir pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam ekonomikos atsigavimui“ Nr. 13.1.1-LVPA-K-860 „E. komercijos modelis COVID-19“. Projektas yra finansuojamas Europos regioninės plėtros fondo lėšomis. Finansuojama kaip Europos Sąjungos atsako į COVID-19 pandemiją priemonė.</p>
            <p><span class="ms-4"></span>IĮ E. Mikucko firma įkurta 1995 metais ir sėkmingai plėtoja verslą pramogų bei laisvalaikio organizavimo srityje.</p>
            <p><span class="ms-4"></span>Įmonė siekia teikti aukščiausios kokybės paslaugas bei pasiūlyti sprendimus, apimančius įvairaus dydžio projektus. Vienos labiausiai besiplečiančių įmonės paslaugų – tai laisvalaikio ir pramogų įrangos nuomos paslaugos.</p>
            <p><span class="ms-4"></span>Iki šiol įmonė savo paslaugas pardavinėjo tik tiesioginiu būdu, tačiau neturėdama galimybės valdyti verslo sandorių el. būdu (t.y. vykdyti produktų užsakymus elektroninėse prekybos platformoje), ribojo potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą.</p>
            <p><span class="ms-4"></span>Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, labiau išplėsti pardavimus, nusprendė skaitmenizuoti klientų aptarnavimo procesus ir pardavinėti savo produktus naudojantis elektroninės komercijos sprendimais.</p>
            <p><span class="ms-4"></span>Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos platforma, panaudojant pažangiausias informacines technologijas, suteikiančias naujas galimybes inovatyviam produktų pardavimui.</p>
            <p><span class="ms-4"></span>Įgyvendintas projektas leis įmonei efektyviau pardavinėti savo paslaugas, užtikrins greitesnį ir kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo laikas leis aptarnauti daugiau klientų, tai užtikrins įmonės pajamų augimą.</p>
            <p><span class="ms-4"></span>Projekto įgyvendinimo laikotarpis nuo 2022 m. vasario mėn. iki 2023 m. vasario mėn.</p>
        </div>
    </div>
@endsection
