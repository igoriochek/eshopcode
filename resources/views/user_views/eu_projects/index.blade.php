@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'policy',
        'secondPageName' => __('menu.euProjects'),
        'hasThirdPage' => false
    ])
    <div class="container product-section my-4">
        @if (App()->getLocale() === 'lt')
            <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="520">
        @else
            <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" width="450" class="my-5">
        @endif
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>UAB „Vadeiva“ įgyvendina ES struktūrinėmis lėšomis finansuojamą projektą Nr. 13.1.1-LVPA-K-860-01-0453 „E. komercijos modelio diegimas UAB „Vadeiva“. Bendra projekto vertė – 59 930,00 Eur, iš kurių 44 947,50 Eur sudaro Europos regioninės plėtros fondo lėšos.</p>
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>Parama projekto įgyvendinimui suteikta pagal 2014–2020 metų Europos Sąjungos fondų investicijų veiksmų programos 13 prioriteto „Veiksmų, skirtų COVID-19 pandemijos sukeltai krizei įveikti, skatinimas ir pasirengimas aplinką tausojančiam, skaitmeniniam ir tvariam ekonomikos atsigavimui“ Nr. 13.1.1-LVPA-K-860 „E. komercijos modelis COVID-19“. Projektas yra finansuojamas Europos regioninės plėtros fondo lėšomis. Finansuojama kaip Europos Sąjungos atsako į COVID-19 pandemiją priemonė.</p>
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>UAB „VADEIVA“ – tai turinio rinkodaros agentūra, sujungianti turinio inovacijas ir ilgametę turinio, leidybos ir darbo su garsiausiais prekės ženklais patirtį.</p>
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>Susidūrusi su COVID-19 pandemija ir dėl to kritusiomis pajamomis, įmonė nutarė pradėti naują veiklą - tai įmonės planuojamų gaminti vitaminų (maisto papildų) pardavimas.</p>
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>Iki šiol įmonė savo produktus pardavinėjo tik tiesioginiu būdu, tačiau neturėdama galimybės valdyti verslo sandorių el. būdu (t.y. vykdyti produktų užsakymus elektroninėse prekybos platformoje), ribojo potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą.</p>
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>Įmonė, siekdama padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, labiau išplėsti pardavimus, nusprendė skaitmenizuoti pardavimo procesus ir pardavinėti savo planuojamus gaminti produktus naudojantis elektroninės komercijos sprendimais.</p>
        <p style="line-height: 32px"><span class="ms-4 ps-2"></span>Šis projektas inovatyvus tuo, kad bus kuriama elektroninės prekybos platforma, panaudojant pažangiausias informacines technologijas, suteikiančias naujas galimybes inovatyviam produktų pardavimui.</p>
    </div>
@endsection
