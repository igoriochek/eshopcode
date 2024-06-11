@extends('layouts.app')

@section('title', __('menu.euProjects'))

@section('content')
    <div class="container py-5">
        <div class="product-section">
            <h4 class="mb-4">{{ __('menu.euProjects') }}</h5>
                @if (App()->getLocale() == 'lt')
                    <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" class="col-md-6 col-12">
                @else
                    <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" class="my-5 col-md-6 col-12">
                @endif
                <p style="line-height: 2rem">
                    UAB „Consultus Magnus“, įgyvendina projektą <b>„E. pardavimo sandorių sudarymo sprendimų diegimas UAB
                        „Consultus Magnus“</b> Nr. 02-033-K-0052. Bendra projekto vertė – <b>50 268,60</b> Eur, iš kurių
                    <b>24 995,20</b> Eur
                    sudaro Europos Sąjungos fondų ir (arba) Ekonomikos gaivinimo ir atsparumo didinimo priemonės lėšos ir
                    Lietuvos Respublikos valstybės biudžeto lėšos.<br>
                    Projektas įgyvendinamas pagal Sutartyje, plėtros programos pažangos priemonės Nr. 05-001-01-05-05
                    „Skatinti įmones skaitmenizuotis“ veiklos „Skatinti labai mažų, mažų ir vidutinių įmonių skaitmeninimą,
                    finansuojant e. pardavimo sandorių sudarymo sprendimų diegimą, paslaugų ir produktų konfigūravimą ir
                    vizualizaciją“ poveiklės „Skatinti labai mažų, mažų ir vidutinių įmonių skaitmeninimą, finansuojant e.
                    pardavimo sandorių sudarymo sprendimų diegimą, paslaugų ir produktų konfigūravimą ir vizualizaciją“
                    (Sostinės regionas) ir poveiklės „Skatinti labai mažų, mažų ir vidutinių įmonių skaitmeninimą,
                    finansuojant e. pardavimo sandorių sudarymo sprendimų diegimą, paslaugų ir produktų konfigūravimą ir
                    vizualizaciją“ (Vidurio ir vakarų Lietuvos regionas) projektų finansavimo sąlygų apraše, patvirtintame
                    Lietuvos Respublikos ekonomikos ir inovacijų ministro 2022 m. liepos 15 d. įsakymu Nr. 4-877 „Dėl
                    2022–2030 metų plėtros programos valdytojos Lietuvos respublikos ekonomikos ir inovacijų ministerijos
                    ekonomikos transformacijos ir konkurencingumo plėtros programos pažangos priemonės Nr. 05-001-01-05-05
                    „Skatinti įmones skaitmenizuotis“ aprašo patvirtinimo“, Projektų administravimo ir finansavimo
                    taisyklėse patvirtintose Lietuvos Respublikos finansų ministro 2022 m. birželio 22 d. įsakymu Nr. 1K-237
                    „Dėl 2021–2027 metų Europos Sąjungos fondų investicijų programos ir Ekonomikos gaivinimo ir atsparumo
                    didinimo plano „Naujos kartos Lietuva“ įgyvendinimo“, ir juose nurodytuose ES ir Lietuvos Respublikos
                    teisės aktuose nustatytas sąlygas ir tvarką.<br>
                    Projektu siekiama įmonę skaitmenizuotis, įsidiegti e. pardavimo sandorių sudarymo sprendimus UAB
                    „Consultus Magnus“ – šiuolaikinė konsultacinė įmonė, Lietuvoje sėkmingai dirbanti nuo 1997 m.
                    Pagrindinės veiklos sritys: konsultacijos verslo finansavimo galimybių, paraiškų rengimo ES
                    Struktūriniams fondams, tarptautinėms ir nacionalinėms programoms, galimybių studijų, mokslinių tyrimų,
                    investicinių projektų ir verslo planų rengimas, projektų valdymas, tarpininkavimas pritraukiant
                    investuotojus. Įmonė taip kuria įvairias socialines technologijas ir inovacijas, bei vykdo verslo,
                    gamybinių, paslaugų teikimo procesų optimizavimą.<br>
                    Vienos labiausiai besiplečiančių įmonės paslaugų - tai įvairių verslo konsultavimo, verslo planų,
                    galimybių studijų, paraiškų ES finansavimui gauti rengimo paslaugų (toliau – produktų) pardavimas. Iki
                    šiol įmonė savo produktus pardavinėjo tik tiesioginiu būdu, klientų aptarnavimo procesai, įskaitant
                    produktų užsakymų valdymą, nėra skaitmenizuoti, todėl dabartiniai sprendimai nesudaro galimybės
                    darbuotojams teikti paslaugas efektyviai; neturėdama galimybės valdyti verslo sandorių el. būdu (t. y.
                    vykdyti produktų pirkimo ir pardavimo procesą internetu, įskaitant ir produktų paieškos, krepšelio
                    (užsakymo) suformavimo, mokėjimo atlikimo bei užsakymo įvykdymo ir valdymo funkcijas ir pan.), įmonė
                    ribojo potencialių klientų ratą ir tuo pačiu įmonės pajamų augimą. Įmonė, siekdama padidinti
                    konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, labiau išplėsti pardavimus,
                    nusprendė įsidiegti e. pardavimo sandorių sprendimus ir pardavinėti savo produktus naudojantis
                    elektroninės prekybos sprendimais. Šis projektas inovatyvus tuo, kad bus kuriama e. pardavimo sandorių
                    sudarymo platforma, paremta pažangiausiomis informacinėmis technologijomis, suteikiančias naujas
                    galimybes inovatyviam produktų pardavimui.<br>
                    Įgyvendintas projektas leis įmonei skaitmenizuoti pardavimų procesą, efektyviau pardavinėti savo
                    produktus, užtikrins greitesnį ir kokybiškesnį klientų aptarnavimą, sutrumpėjęs produktų pardavimo
                    laikas leis aptarnauti daugiau klientų, tai užtikrins didesnį produktų prieinamumą ir įmonės pajamų
                    augimą.<br><br>
                    Projekto veiklas numatyta užbaigti 2025 m. gegužės mėn.<br><br>
                    Su projektu susijusios užklausos gali būti adresuojamos <a
                        href="mailto:info@consultusmagnus.com">info@consultusmagnus.com</a>
                </p>
        </div>
    </div>
@endsection
