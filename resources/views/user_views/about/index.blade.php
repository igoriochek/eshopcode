@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
    'secondPageLink' => 'policy',
    'secondPageName' => __('menu.euProjects'),
    'hasThirdPage' => false
])
    <div class="container py-10">
        <h3 class="mb-4">{{ __('menu.euProjects') }}</h3>
        @if (App()->getLocale() == 'lt')
            <img src="{{ asset('images/es_projektai.jpeg') }}" alt="ES projektai" class="col-md-6 col-12">
        @elseif (App()->getLocale() == 'en')
            <img src="{{ asset('images/eu_projects.jpeg') }}" alt="EU projects" class="my-5 col-md-6 col-12">
        @else
            <img src="{{ asset('images/eu_projects.jpeg') }}" alt="Проекты ЕС" class="my-5 col-md-6 col-12">
        @endif
        <p><span class="ms-4"></span>UAB "MD Projects" įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą Nr. 13.1.1-LVPA-K-860-01-0447 "E. komercijos modelio diegimas UAB "MD Projects". Bendra projekto vertė – <b>59 930,00</b> Eur, iš kurių <b>44 947,50</b> Eur sudaro Europos regioninės plėtros fondo lėšos.</p>
        <p><span class="ms-4"></span>Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos fondų investicijų veiksmų programos 13 prioriteto "Veiksmų, skirtų COVID-19 pandemijos sukeltai krizei įveikti, skatinimas ir pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam ekonomikos atsigavimui" Nr. 13.1.1-LVPA-K-860 "E. komercijos modelis COVID-19". Projektas yra finansuojamas Europos regioninės plėtros fondo lėšomis. Finansuojama kaip Europos Sąjungos atsako į COVID-19 pandemiją priemonė.</p>
        <p><span class="ms-4"></span>UAB "MD Projects" – tai mokymo paslaugas ir informacinių technologijų konsultacijas teikianti įmonė. Pagrindinės veiklos kryptys: Informacinių sistemų kūrimas ir palaikymas, IT konsultacijos, specializuotų mokymų (statybos teisė, verslo konsultacijų, kompiuterinio programavimo, kt.) paslaugos.</p>
        <p><span class="ms-4"></span>Įmonė siekia teikti aukščiausios kokybės paslaugas bei pasiūlyti sprendimus, apimančius įvairaus dydžio projektus. Vienos labiausiai besiplečiančių įmonės paslaugų – tai specializuotų mokymų paslaugos.</p>
        <p><span class="ms-4"></span>Iki šiol įmonė savo paslaugas pardavinėjo tik tiesioginiu būdu, tačiau neturėdama galimybės valdyti verslo sandorių el. būdu (t.y. vykdyti produktų užsakymus elektroninėse prekybos platformoje), ribojo potencialių klientų skaičių ir tuo pačiu įmonės pajamų augimą.</p>
        <p><span class="ms-4"></span>Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, labiau išplėsti pardavimus, nusprendė skaitmenizuoti pardavimo procesus ir pardavinėti savo produktus naudojantis elektroninės komercijos sprendimais.</p>
        <p><span class="ms-4"></span>Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos platforma, panaudojant pažangiausias informacines technologijas, suteikiančias naujas galimybes inovatyviam mokymo paslaugų pardavimui.</p>
        <p><span class="ms-4"></span>Įgyvendintas projektas leis įmonei efektyviau pardavinėti savo produktus, užtikrins greitesnį ir kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo laikas leis aptarnauti daugiau klientų, tai užtikrins įmonės pajamų augimą.</p>
        <p><span class="ms-4"></span>Projekto įgyvendinimo laikotarpis nuo 2022 m. vasario mėn. iki 2023 m. vasario mėn.</p>
    </div>
@endsection
