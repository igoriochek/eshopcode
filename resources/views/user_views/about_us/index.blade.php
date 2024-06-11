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
                    <div class="section-title">
                        @if (app()->getLocale() == 'lt')
                                    <p class="short-desc mb-0" style="text-align: start;">
                                        UAB "Dts Solutions" – kokybiškas buhalterines ir teisines paslaugas teikianti įmonė.<br><br>
                                        Nėra tokios organizacijos, kur buhalterija ir vidaus auditas nebūtų svarbūs. Šitas pagrindinės vidinės veiklos, padedančios įmonėms ir organizacijoms veikti teisėtas ir veiksmingas.<br><br>
                                        Mūsų patyrę partneriai įvairiose šalyse padarys viską, kad žinotų ir suprastų jūsų verslą ir yra tam pasiruošę teikti platų kokybiškų paslaugų spektrą.<br><br>
                                        Turime partnerių Europos Sąjungoje ir už jos ribų, esame orientuoti į stiprų ir stiprų kūrimą ilgalaikius santykius su klientais, kurie siekia dviejų pagrindinių dalykų: profesinės kompetencijos specializuotos paslaugos ir išskirtiniai santykiai su klientais.<br><br>
                                        Siekdami padidinti konkurencingumą, pritraukti daugiau klientų ir efektyviau juos aptarnauti, nuspręsta suskaitmeninti apskaitos paslaugų ir teisinių paslaugų pardavimo procesus, skatinti ir parduoti savo paslaugas naudodamiesi el. prekybos sprendimais.<br><br>
                                        Šis projektas yra naujoviškas, nes bus sukurta elektroninė platforma komercija naudojant moderniausias informacines technologijas, suteikiančias naujų galimybių inovacijoms buhalterinės apskaitos produktų pardavimas.<br><br>
                                        Mūsų projektas leis įmonei efektyviau parduoti savo paslaugas, teikti greičiau ir geriau klientų aptarnavimas, sutrumpės paslaugų įgyvendinimo laikas, leis aptarnauti daugiau klientų, o tai užtikrins įmonės pajamų augimas.<br><br>
                                    </p>
                                @elseif (app()->getLocale() == "ru")
                                    <p class="short-desc mb-0" style="text-align: start;">
                                        ЗАО "Dts Solutions" - это компания, предоставляющая высококачественные бухгалтерские и юридические услуги.<br><br>
                                        Нет такой организации, где бухгалтерия и внутренний аудит не имели бы значения. Это основная внутренняя деятельность, которая помогает предприятиям и организациям работать законно и эффективно.<br><br>
                                        Наши опытные партнеры в разных странах сделают все, чтобы узнать и понять ваш бизнес и готовы предоставить для этого широкий спектр качественных услуг.<br><br>
                                        У нас есть партнеры внутри и за пределами Европейского Союза, мы ориентированы на построение прочных и прочных долгосрочных отношений с клиентами, которые стремятся к двум основным вещам: специализированным услугам профессиональной компетентности и эксклюзивным отношениям с клиентами.<br><br>
                                        С целью повышения конкурентоспособности, привлечения большего количества клиентов и более эффективного их обслуживания было принято решение оцифровать процессы продаж бухгалтерских и юридических услуг, продвигать и продавать свои услуги с помощью решений электронной коммерции.<br><br>
                                        Данный проект является инновационным, поскольку позволит создать электронную платформу для коммерции с использованием самых современных информационных технологий, предоставляя новые возможности для инноваций в реализации бухгалтерских продуктов.<br><br>
                                        Наш проект позволит компании более эффективно продавать свои услуги, обеспечить более быстрое и качественное обслуживание клиентов, сократить время на реализацию услуг, позволит обслуживать больше клиентов, что обеспечит рост выручки компании.<br><br>
                                    </p>
                                @else
                                    <p class="short-desc mb-0" style="text-align: start;">
                                        UAB "Dts Solutions" is a company providing high-quality accounting and legal services.<br><br>
                                        There is no such organization where bookkeeping and internal audit would not matter. This is the core internal activity that helps businesses and organizations operate legally and effectively.<br><br>
                                        Our experienced partners in different countries will do everything to know and understand your business and are ready to provide a wide range of quality services for this.<br><br>
                                        We have partners inside and outside the European Union, we are focused on building strong and strong long-term relationships with clients who strive for two main things: specialized services of professional competence and exclusive customer relationships.<br><br>
                                        In order to increase competitiveness, attract more customers and serve them more efficiently, it was decided to digitize the sales processes of accounting services and legal services, to promote and sell their services using e-commerce solutions.<br><br>
                                        This project is innovative because it will create an e-platform for commerce using the most modern information technologies, providing new opportunities for innovation in the sale of accounting products.<br><br>
                                        Our project will allow the company to sell its services more efficiently, provide faster and better customer service, reduce the time for the implementation of services, allow to serve more customers, which will ensure the growth of the company's revenue.<br><br>
                                    </p>
                                @endif
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection