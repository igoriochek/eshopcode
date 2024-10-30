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
                            @elseif(App()->getLocale() == 'en')
                                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" class="col-md-6 col-12">
                                <p class="short-desc mb-0" style="text-align: start;">
                                    UAB "Jodesta" is implementing a project funded by EU structural funds
                                    No. 13.1.1-LVPA-K-860-01-0168
                                    “Implementation of the E-commerce model at UAB "Bilan". The total project value is <b>59
                                        930.00</b> EUR, of which <b>44
                                        947.50</b> EUR consists of funds from the European Regional Development Fund.
                                    <br>Funding for the project implementation was provided under the 2014–2020 European Union
                                    Fund Investment Action
                                    Program's 13 priority "Actions to mitigate the crisis caused by the COVID-19 pandemic and
                                    prepare for an environmentally friendly, digital, and sustainable economic recovery" No. 13.1.1-LVPA-K-860
                                    "E-commerce model COVID-19". The project is financed by the European Regional Development Fund.
                                    Funded as part of the European Union's response to the COVID-19 pandemic.
                                    <br>UAB "Bilan" is a company providing quality accounting and legal
                                    services. Main activity
                                    areas: accounting, business and legal consulting services, company formation.
                                    One of the fastest-growing company services is financial accounting services.
                                    <br>Until now, the company sold its services only directly, but
                                    lacking the ability to manage
                                    business transactions electronically (i.e., to place product orders on electronic
                                    trading platforms), limited
                                    the circle of potential clients and at the same time restricted the company's revenue growth.
                                    <br>In order to increase competitiveness, attract more clients, and
                                    serve them more efficiently,
                                    broaden sales, the company decided to digitize the sales processes of accounting services
                                    and sell its
                                    services using e-commerce solutions.
                                    <br>This project is innovative in that an e-commerce platform will be created using
                                    advanced
                                    information technologies, providing new opportunities for the innovative sale of accounting
                                    products.
                                    <br>The implemented project will allow the company to sell its products more
                                    efficiently,
                                    ensure faster and higher-quality customer service, and a shortened sales time for products will
                                    enable serving more clients, which will ensure the company's revenue growth.
                                    <br>The project implementation period is from March 2022 to March 2023.
                                </p>

                            @else  
                                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" class="col-md-6 col-12">
                                <p class="short-desc mb-0" style="text-align: start;">
                                    UAB "Jodesta" реализует проект, финансируемый структурными фондами ЕС
                                    № 13.1.1-LVPA-K-860-01-0168
                                    «Внедрение модели электронной торговли в UAB "Bilan". Общая стоимость проекта составляет <b>59
                                        930,00</b> евро, из которых <b>44
                                        947,50</b> евро составляют средства Европейского фонда регионального развития.
                                    <br>Поддержка реализации проекта была предоставлена в рамках инвестиционной
                                    программы фондов Европейского Союза 2014–2020 годов
                                    приоритет 13 "Меры, направленные на преодоление кризиса, вызванного пандемией COVID-19, и
                                    подготовка к экологически чистому, цифровому и устойчивому восстановлению экономики" № 13.1.1-LVPA-K-860
                                    "Модель электронной торговли COVID-19". Проект финансируется средствами Европейского
                                    фонда регионального развития.
                                    Финансируется как часть ответа Европейского Союза на пандемию COVID-19.
                                    <br>UAB "Bilan" — компания, предоставляющая качественные бухгалтерские и юридические
                                    услуги. Основные области деятельности:
                                    бухгалтерский учет, консультационные услуги в области бизнеса и права, создание компаний.
                                    Одной из наиболее быстрорастущих услуг компании являются услуги финансового учета.
                                    <br>До настоящего времени компания продавала свои услуги только напрямую, однако
                                    не имея возможности управлять
                                    бизнес-транзакциями в электронном виде (т.е. выполнять заказы продуктов на электронных
                                    торговых платформах), ограничивала
                                    круг потенциальных клиентов и тем самым ограничивала рост доходов компании.
                                    <br>С целью повышения конкурентоспособности, привлечения большего количества клиентов и
                                    более эффективного их обслуживания,
                                    расширения продаж, компания решила цифровизировать процессы продажи бухгалтерских услуг
                                    и продавать свои
                                    услуги, используя решения электронной торговли.
                                    <br>Этот проект инновационен тем, что будет создана платформа электронной торговли с
                                    использованием передовых
                                    информационных технологий, предоставляющих новые возможности для инновационной продажи
                                    бухгалтерских продуктов.
                                    <br>Реализованный проект позволит компании более эффективно продавать свои продукты,
                                    обеспечит более быстрое и качественное обслуживание клиентов, сокращение времени продажи
                                    продуктов позволит обслуживать больше клиентов, что обеспечит рост доходов компании.
                                    <br>Период реализации проекта с марта 2022 года по март 2023 года.
                                </p>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
